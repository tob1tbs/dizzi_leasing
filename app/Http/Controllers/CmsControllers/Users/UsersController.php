<?php

namespace App\Http\Controllers\CmsControllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Validator;
use Str;
use Hash;

use Carbon\Carbon;

use App\Models\Users\UserReset;
use App\Models\Users\User;
use App\Models\Users\UserGender;
use App\Models\Users\UserRole;

use App\Models\Leasing\BackLeasingParameters;

class UsersController extends Controller
{
    //
    public function __construct() {
        
    }

    public function actionUsersLogin() {
        if(Auth::check()) {
            return redirect()->route('actionMain');
        } else {
            if (view()->exists('cms.sections.users.users_login')) {
                $data = [];
                return view('cms.sections.users.users_login', $data);
            } else {
                abort('404');
            }
        }
    }

    public function actionUsersLoginRequest(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'ელ-ფოსტა ან პაროლი არასწორია',
            );
            $validator = Validator::make($Request->all(), [
                'email' => 'required',
                'password' => 'required',
            ], $messages)->validate();

            if(Auth::attempt(['email' => $Request->email, 'password' => $Request->password, 'is_system' => 1, 'deleted_at_int' => 1, 'status' => 1], true)) {
                $User = new User();
                $User->where('email', $Request->email)->update([
                    'last_login' => Carbon::now(),
                ]);
                return redirect()->route('actionMain');
            } else {
                return back()->with('error', 'ელ-ფოსტა ან პაროლი არასწორია');
            }
        }
    }

    public function actionUsersLogout(Request $Request) {
        if($Request->isMethod('GET')) {
            Auth::logout();
            return redirect()->route('actionUsersLogin');
        }
    }

    public function actionUsersReset() {
        if(Auth::check()) {
            return redirect()->route('actionMain');
        } else {
            if (view()->exists('cms.sections.users.users_reset')) {
                $data = [];
                return view('cms.sections.users.users_reset', $data);
            } else {
                abort('404');
            }
        }
    }

    public function actionUsersResetRequest(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეიყვანოთ ელ-ფოსტა',
                'exists' => 'ელ-ფოსტა არ მოიძებნა',
            );
            $validator = Validator::make($Request->all(), [
                'email' => 'required|exists:cms_users,email',
            ], $messages)->validate();

            $UserReset = new UserReset();
            $UserResetCheck = $UserReset::where('email', $Request->email)->where('used', 0)->orderBy('id', 'DESC')->first();
            if(!empty($UserResetCheck) && $UserResetCheck->created_at->addMinute(5)->gt(Carbon::now())) {
                $errorMessage = 'თქვენ უკვე მოითხოვეთ პაროლის აღდგენა ელ-ფოსტაზე <b>'.$Request->email.'</b> გთხოვთ სცადოთ განმეორებით 5 წუთში';
                return back()->with(['error' => $errorMessage]);;
            } else {
                $UserReset->email = $Request->email;
                $UserReset->token = Str::random(64);
                $UserReset->save();
                $successMessage = 'აღდგენის ბმული გამოგზავნილია თქვენს ელ-ფოსტაზე <b>'.$Request->email.'</b>, აღდგენის ბმული ვალიდურია 15 წუთის განმავლობაში.';
                return back()->with(['success' => $successMessage]);
            }
        }
    } 

    public function actionUsersResetForm(Request $Request) {
        if($Request->isMethod('GET') && !empty($Request->token)) {
            $UserReset = new UserReset();
            $TokenVerify = $UserReset->where('token', $Request->token)->where('email', $Request->email)->where('used', 0)->first();
            
            if(!empty($TokenVerify) && Carbon::now()->lt($TokenVerify->created_at->addMinute(15))) {
                $data = [];
                return view('cms.sections.users.users_reset_form', $data);
            } else {
                $errorMessage = 'უსაფრთხოების ტოკენი არ არის ვალიდური';
                return redirect()->route('actionUsersLogin')->with(['success' => $errorMessage]);
            }
        } else {
            $errorMessage = 'უსაფრთხოების ტოკენი არ არის ვალიდური';
            return redirect()->route('actionUsersLogin')->with(['success' => $errorMessage]);
        }
    }

    public function actionUsersResetFormSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'token.required' => 'უსაფრთხოების ტოკენი არ არის ვალიდური',
                'email.required' => 'გთხოვთ შეიყვანოთ ელ-ფოსტა',
                'password.required' => 'გთხოვთ შეიყვანოთ პაროლი',
                'password_confirmation.required' => 'გთხოვთ შეიყვანოთ პაროლის განმეორება',
                'same' => 'პაროლები ერთამენთს არ ემთხვევა',
            );
            $validator = Validator::make($Request->all(), [
                'email' => 'required',
                'password' => 'string|min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required',
            ], $messages)->validate();

            $User = new User();
            $User->where('email', $Request->email)->update([
                'password' => Hash::make($Request->password),
            ]);

            $UserReset = new UserReset();
            $TokenVerify = $UserReset->where('token', $Request->token)->where('email', $Request->email)->where('used', 0)->update([
                'used' => 1,
            ]);
            $successMessage = 'აღდგენის ბმული გამოგზავნილია თქვენს ელ-ფოსტაზე <b>'.$Request->email.'</b>, აღდგენის ბმული ვალიდურია 15 წუთის განმავლობაში.';
            return redirect()->route('actionUsersLogin')->with(['success' => $successMessage]);
        } else {
            abort('404');
        }
    }

    public function actionUsersMain() {
        if (view()->exists('cms.sections.users.users_main')) {
            
            $User = new User();
            $UsersList = $User::where('deleted_at_int', '!=', 0)->get();

            $UserGender = new UserGender();
            $UserGenderList = $UserGender::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $UserRole = new UserRole();
            $UserRoleList = $UserRole::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'users_list' => $UsersList,
                'users_gender_list' => $UserGenderList,
                'users_role_list' => $UserRoleList,
            ];
            return view('cms.sections.users.users_main', $data);
        } else {
            abort('404');
        }
    }

    public function actionUsersView(Request $Request) {
        if (view()->exists('cms.sections.users.users_data')) {
            
            $User = new User();
            $UsersData = $User::find($Request->id);

            $BackLeasingParameter = new BackLeasingParameters();
            $BackLeasingParametersList = $BackLeasingParameter::where('deleted_at_int', '!=', 0)->get()->toArray();

            $BackLeasingParametersArray = [];

            foreach($BackLeasingParametersList as $ParameterItem) {
                $BackLeasingParametersArray[$ParameterItem['key']] = $ParameterItem['value'];
            }

            $data = [
                'users_data' => $UsersData,
                'back_leasing_parameters' => $BackLeasingParametersArray,
            ];
            return view('cms.sections.users.users_data', $data);
        } else {
            abort('404');
        }
    }

    public function actionUsersRoles() {
        if (view()->exists('cms.sections.users.users_role')) {

            $UserRole = new UserRole();
            $UserRoleList = $UserRole::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'user_role_list' => $UserRoleList,
            ];
            return view('cms.sections.users.users_role', $data);
        } else {
            abort('404');
        }
    }
}
