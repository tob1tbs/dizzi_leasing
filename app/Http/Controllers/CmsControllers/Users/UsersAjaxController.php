<?php

namespace App\Http\Controllers\CmsControllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ServiceControllers\CrmController;
use App\Http\Controllers\ServiceControllers\SmsController;

use Validator;
use Auth;
use Hash;
use Carbon\Carbon;

use App\Models\Users\UserVerify;
use App\Models\Users\User;
use App\Models\Users\UserRole;
use App\Models\Users\UserPermissionGroup;
use App\Models\Users\UserPermission;
use App\Models\Users\UserRoleHasPermission;


class UsersAjaxController extends Controller
{
    //
    public function __construct() {

    }

    public function ajaxUserVerify(Request $Request) {
        if($Request->isMethod('POST')) {
            $User = new User();
            $UserData = $User->find($Request->user_id);

            $UserVerify = new UserVerify();
            $UserVerify->method = $Request->method;

            if($Request->method == 1) {
                $UserVerify->phone = $UserData->phone;
            }
            if($Request->method == 2) {
                $UserVerify->email = $UserData->email;
            }

            $UserVerify->code = rand(111111, 999999);
            $UserVerify->save();

            return response()->json(['status' => true, 'user_id' => $UserData->id,'method' => $Request->method]);
        }
    }

    public function ajaxUserVerifySubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $User = new User();
            $UserData = $User->find($Request->user_id);

            $UserVerify = new UserVerify();
            $UserVerifyCheck = $UserVerify::where('used', 0);

            if($Request->method == 1) {
                $UserVerifyCheck = $UserVerifyCheck->where('phone', $UserData->phone);
            }

            if($Request->method == 2) {
                $UserVerifyCheck = $UserVerifyCheck->where('email', $UserData->email);
            }

            $UserVerifyCheck = $UserVerifyCheck->orderBy('id', 'DESC')->first();

            if($UserVerifyCheck->code == $Request->code) {
                if($Request->method == 1) {
                    $UserData->update([
                        'verify_phone' => 1,
                    ]);
                    $UserVerifyCheck->update(['used' => 1]);
                }

                if($Request->method == 2) {
                    $UserData->update([
                        'verify_email' => 1,
                    ]);
                    $UserVerifyCheck->update(['used' => 1]);
                }

                return response()->json(['status' => true, 'message' => 'ვერიფიკაცია დასრულდა წარმატებით !!!']);
            } else {
                return response()->json(['status' => false, 'message' => 'ვერიფიკაციის კოდი არასწორია გთხოვთ სცადოთ თავიდან !!!']);
            }
        }
    }

    public function ajaxUserStatusChange(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->user_id)) {
            $User = new User();
            $User::find($Request->user_id)->update([
                'status' => $Request->user_status
            ]);
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxUserDelete(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->user_id)) {
            $User = new User();
            $User::find($Request->user_id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_at_int' => 0,
                'status' => 0,
            ]);
            return response()->json(['status' => true, 'message' => 'მომხმარებელი წარმატებით წაიშალა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxUserSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'user_personal_number.unique' => 'პირადი ნომერი დაკავებულია',
                'user_phone.unique' => 'ტელეფონის ნომერი დაკავებულია',
                'user_email.unique' => 'ელ-ფოსტა დაკავებულია',
            );
            $validator = Validator::make($Request->all(), [
                'user_name' => 'required|max:255',
                'user_lastname' => 'required|max:255',
                'user_bday' => 'required|max:255',
                'user_personal_number' => 'required|unique:cms_users,personal_number,'.$Request->user_id.'|max:255',
                'user_gender' => 'required|max:255',
                'user_phone' => 'required|unique:cms_users,phone,'.$Request->user_id.'|max:255',
                'user_email' => 'required|unique:cms_users,email,'.$Request->user_id.'|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $User = new User();
                $UserInfo = $User::updateOrCreate(
                    ['id' => $Request->user_id],
                    [
                        'id' => $Request->user_id,
                        'name' => $Request->user_name,
                        'lastname' => $Request->user_lastname,
                        'bday' => $Request->user_bday,
                        'phone' => $Request->user_phone,
                        'email' => $Request->user_email,
                        'personal_number' => $Request->user_personal_number,
                        'gender' => $Request->user_gender,
                    ],
                );
                return response()->json(['status' => true, 'errors' => false, 'message' => 'მომხმარებელი წარმატებით დაემატა'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxUserEdit(Request $Request ) {
        if($Request->isMethod('GET') && $Request->user_id > 0) {
            $User = new User();
            $UserData = $User::find($Request->user_id);

            if(!empty($UserData)) {
                return response()->json(['status' => true, 'UserData' => $UserData]);
            } else {
                return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxRoleSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'role_key.unique' => 'მოცემული KEY დაკავებულია',
            );
            $validator = Validator::make($Request->all(), [
                'role_title' => 'required|max:255',
                'role_name' => 'required|unique:cms_roles,name,'.$Request->role_id.'|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $UserRole = new UserRole();
                $UserRoleInfo = $UserRole::updateOrCreate(
                    ['id' => $Request->role_id],
                    [
                        'id' => $Request->role_id,
                        'name' => $Request->role_name,
                        'title' => $Request->role_title,
                        'guard_name' => 'web',
                    ],
                );
                return response()->json(['status' => true, 'errors' => false, 'message' => 'მომხმარებელი წარმატებით დაემატა'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxRoleStatusChange(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->user_id)) {
            $UserRole = new UserRole();
            $UserRole::find($Request->role_id)->update([
                'status' => $Request->role_status,
            ]);
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxRoleEdit(Request $Request) {
        if($Request->isMethod('GET') && !empty($Request->role_id) && $Request->role_id != 1 && $Request->role_id != 2) {
            $UserRole = new UserRole();
            $UserRoleData = $UserRole::find($Request->role_id);

            if(!empty($UserRoleData)) {
                return response()->json(['status' => true, 'UserRoleData' => $UserRoleData]);
            } else {
                return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxRoleDelete(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->role_id) && $Request->role_id != 1 && $Request->role_id != 2) {
            $UserRole = new UserRole();
            $UserRole::find($Request->role_id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_at_int' => 0,
                'status' => 0,
            ]);
            return response()->json(['status' => true, 'message' => 'ჯგუფი წარმატებით წაიშალა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxRolePermissions(Request $Request) {
        if($Request->isMethod('GET')) {
            $UserPermissionGroup = new UserPermissionGroup();
            $UserPermissionGroupData = $UserPermissionGroup::where('deleted_at_int', '!=', 0)->where('status', 1)->get()->toArray();

            $PermissionGroupArray = [];
            $PermissionArray = [];

            foreach($UserPermissionGroupData as $PermissionGroupItem) {

                $UserPermission = new UserPermission();
                $UserPermissionList = $UserPermission::where('group_id', $PermissionGroupItem['id'])
                ->where('deleted_at_int', '!=', 0)
                ->where('status', 1)
                ->get()
                ->toArray();

                foreach($UserPermissionList as $UserPermissionItem) {
                    if($PermissionGroupItem['id'] == $UserPermissionItem['group_id']) {
                        
                        $UserRoleHasPermission = new UserRoleHasPermission();
                        $UserRoleHasPermissionList = $UserRoleHasPermission::where('role_id', $Request->role_id)->get()->toArray();

                        $PermissionGroupArray['group_data'][$PermissionGroupItem['id']] = [
                            'group_id' => $PermissionGroupItem['id'],
                            'group_name' => $PermissionGroupItem['name'],
                            'permissions' => [
                                'list' => $UserPermissionList, 
                                'selected' => $UserRoleHasPermissionList
                            ],
                        ];
                    }
                }
            }
            return response()->json(['status' => true, 'PermissionGroupArray' => $PermissionGroupArray]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxPermissionSubmit(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->permission_role_id)) {
            $UserRoleHasPermission = new UserRoleHasPermission();
            $UserRoleHasPermission->where('role_id', $Request->permission_role_id)->delete();

            for ($i=0; $i < count($Request->permissions); $i++) { 
                $UserRoleHasPermission = new UserRoleHasPermission();
                $UserRoleHasPermission->role_id = $Request->permission_role_id;
                $UserRoleHasPermission->permission_id = $Request->permissions[$i];
                $UserRoleHasPermission->save();
            }
            
            return response()->json(['status' => true, 'message' => 'წვდომის ჯგუფი წარმატებით განახლდა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxUserRoleChangeSubmit(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->user_role_change_id)) {
            $UserRole = new UserRole();
            $UserRoleData = $UserRole::where('name', $Request->user_role_change)->firstOrFail();

            if($UserRoleData) {
                $User = new User();
                $UserData = $User::find($Request->user_role_change_id);
                $UserData->syncRoles($Request->user_role_change);
                $UserData->update([
                    'role_id' => $UserRoleData->id,
                ]);
                return response()->json(['status' => true, 'message' => 'წვდომის ჯგუფი წარმატებით შეიცვალა']);
            } else {
                return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxUserSendToCrm(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->user_id)) {
            $User = new User();
            $UserData = $User::where('id', $Request->user_id)->first();

            $SendData = [
                'name' => $UserData->name.' '.$UserData->lastname,
                'phone' => $UserData->phone,
                'email' => $UserData->email,
            ];

            if(empty($UserData)) {
                return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
            } else {
                if($UserData->crm_id > 0) {
                    return response()->json(['status' => false, 'message' => 'მომხმარებელი უკვე არსებობს CRM ში']);
                } else {

                    $CrmController = new CrmController();
                    $CrmResponse = $CrmController->serviceCrmSend($SendData);

                    if($CrmResponse == '{success:true}') {
                        $UserData->crm_id = 1;
                        $UserData->save();
                        $CrmController->serviceCrmSaveLog($SendData, 'send_to_crm', $CrmResponse);
                        return response()->json(['status' => true, 'message' => 'მომხმარებელი დაემატა CRM ში']);
                    } else {
                        return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
                    }
                }
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }
}
