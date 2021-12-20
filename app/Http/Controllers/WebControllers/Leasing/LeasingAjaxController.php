<?php

namespace App\Http\Controllers\WebControllers\Leasing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ServiceControllers\CrmController;

use App\Models\Leasing\LeasingParameter;
use App\Models\Leasing\PromoCode;
use App\Models\Leasing\PromoCodeUsed;
use App\Models\Users\User;

use App\Models\Cars\CarMake;
use App\Models\Cars\CarModel;

use Validator;

class LeasingAjaxController extends Controller
{
    //
    public function ajaxCalculetePmt($month_count, $leasing_price) {
            $LeasingParameter = new LeasingParameter();
            $LeasingParametersList = $LeasingParameter::where('deleted_at_int', '!=', 0)->get()->toArray();

            $LeasingParametersArray = [];

            foreach($LeasingParametersList as $ParameterItem) {
                $LeasingParametersArray[$ParameterItem['key']] = $ParameterItem['value'];
            }

            $month_percent = ($LeasingParametersArray['leasing_month_percent'] * 12) / 1200;
            $loan_month_price = round($month_percent * -$leasing_price * pow((1 + $month_percent), $month_count) / (1 - pow((1 + $month_percent), $month_count)), 2);

            $loan_array = [
                'loan_month_price' => $loan_month_price,
                'loan_month_percent' => $month_percent * 100,
            ];

            return response()->json(['status' => true, 'loan_data' => $loan_array]);
    }

    public function ajaxGetLeasingParameters() {
        $LeasingParameter = new LeasingParameter();
        $LeasingParametersList = $LeasingParameter::where('deleted_at_int', '!=', 0)->get();

        $LeasingArray = [];

        foreach($LeasingParametersList as $ParameterItem) {
            $LeasingArray[$ParameterItem['key']] = $ParameterItem['value'];
        }

        return response()->json(['status' => true , 'LeasingArray' => $LeasingArray]);
    }

    public function ajaxGetLoanData(Request $Request) {
        if($Request->isMethod('GET')) {
            $leasing_price = $Request->leasing_price - $Request->leasing_advance_payment;
            return $this->ajaxCalculetePmt($Request->leasing_month, $leasing_price);
        }
    }

    public function ajaxLeasingFormSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'min' => 'ტელეფონის ნომერი უნდა იყოს 9 ნიშნა',
            );
            $validator = Validator::make($Request->all(), [
                'phone' => 'required|min:9|max:9|regex:/^\S*$/u',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                if (!in_array(substr($Request->phone, 0, 3), $this->getPhoneIndex())) {
                    return response()->json(['status' => true, 'errors' => true, 'message' => 'მოცემული ტელეფონის ინდექსი არასწორია']);
                }
                $SendData = [
                    'phone' => $Request->phone,
                ];

                $CrmController = new CrmController();
                $CrmResponse = $CrmController->serviceCrmSend($SendData);
                $CrmResponse = json_decode($CrmResponse);
                if($CrmResponse->success == 'true') {
                    $CrmController->serviceCrmSaveLog($SendData, 'send_to_crm', $CrmResponse);
                    $RedirectUrl = route('actionWebLeasingForm', 'phone='.$Request->phone.'&amount='.$Request->amount.'&duration='.$Request->duration.'&advance_payment='.$Request->advance_payment);
                    return response()->json(['status' => true, 'errors' => false, 'message' => $validator->getMessageBag()->toArray(), 'RedirectUrl' => $RedirectUrl], 200);
                } else {
                    return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
                }
            }
        }
        else {
            return response()->json(['status' => false]);
        }
    }

    public function ajaxBackLesingFormSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'min' => 'ტელეფონის ნომერი უნდა იყოს 9 ნიშნა',
            );
            $validator = Validator::make($Request->all(), [
                'phone' => 'required|min:9|max:9|regex:/^\S*$/u',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                if (!in_array(substr($Request->phone, 0, 3), $this->getPhoneIndex())) {
                    return response()->json(['status' => true, 'errors' => true, 'message' => 'მოცემული ტელეფონის ინდექსი არასწორია']);
                }
                $SendData = [
                    'phone' => $Request->phone,
                ];

                $CrmController = new CrmController();
                $CrmResponse = $CrmController->serviceCrmSend($SendData);
                $CrmResponse = json_decode($CrmResponse);
                if($CrmResponse->success == 'true') {
                    $CrmController->serviceCrmSaveLog($SendData, 'send_to_crm', $CrmResponse);
                    $RedirectUrl = route('actionWebBackLeasingForm', 'phone='.$Request->phone.'&amount='.$Request->amount.'&duration='.$Request->duration.'&advance_payment='.$Request->advance_payment);
                    return response()->json(['status' => true, 'errors' => false, 'message' => $validator->getMessageBag()->toArray(), 'RedirectUrl' => $RedirectUrl], 200);
                } else {
                    return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
                }
            }
        }
        else {
            return response()->json(['status' => false]);
        }
    }

    public function ajaxTaxiLesingFormSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'min' => 'ტელეფონის ნომერი უნდა იყოს 9 ნიშნა',
            );
            $validator = Validator::make($Request->all(), [
                'phone' => 'required|min:9|max:9|regex:/^\S*$/u',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                if (!in_array(substr($Request->phone, 0, 3), $this->getPhoneIndex())) {
                    return response()->json(['status' => true, 'errors' => true, 'message' => 'მოცემული ტელეფონის ინდექსი არასწორია']);
                }
                $SendData = [
                    'phone' => $Request->phone,
                ];

                $CrmController = new CrmController();
                $CrmResponse = $CrmController->serviceCrmSend($SendData);
                $CrmResponse = json_decode($CrmResponse);
                if($CrmResponse->success == 'true') {
                    $CrmController->serviceCrmSaveLog($SendData, 'send_to_crm', $CrmResponse);
                    $RedirectUrl = route('actionWebTaxiLeasingForm', 'phone='.$Request->phone.'&amount='.$Request->amount.'&duration='.$Request->duration.'&advance_payment='.$Request->advance_payment);
                    return response()->json(['status' => true, 'errors' => false, 'message' => $validator->getMessageBag()->toArray(), 'RedirectUrl' => $RedirectUrl], 200);
                } else {
                    return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
                }
            }
        }
        else {
            return response()->json(['status' => false]);
        }
    }

    public function ajaxLeasingSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
            );
            $validator = Validator::make($Request->all(), [
                'user_name' => 'required|max:255',
                'user_lastname' => 'required|max:255',
                // 'user_bdate' => 'required|max:255',
                'user_personal_number' => 'required|min:11|max:11',
                'user_phone' => 'required|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $LeasingParameter = new LeasingParameter();
                $LeasingParametersList = $LeasingParameter::where('deleted_at_int', '!=', 0)->get()->toArray();

                $LeasingParametersArray = [];

                foreach($LeasingParametersList as $ParameterItem) {
                    $LeasingParametersArray[$ParameterItem['key']] = $ParameterItem['value'];
                }

                $month_percent = ($LeasingParametersArray['leasing_month_percent'] * 12) / 1200;

                $SendData = [];

                $SendData = [
                    'name' => $Request->user_name,
                    'last_name' => $Request->user_lastname,
                    'phone' => $Request->user_phone,
                    'email' => $Request->user_email,
                    'bday' => $Request->user_bdate,
                    'personal_number' => $Request->user_personal_number,
                    'loan_month' => $Request->leasing_month,
                    'loan_price' => $Request->leasing_price - $Request->leasing_advance_payment,
                    'loan_percent' => $LeasingParametersArray['leasing_month_percent'],
                    'fast_review' => $Request->fast_review,
                    'accept_terms' => $Request->accept_terms,
                    'leasing_type' => $Request->leasing_type,
                    'advance_payment' => $Request->leasing_advance_payment,
                ];


                if($Request->car_status == 2) {
                    $SendData['car_data'] = $Request->car_data;
                }

                if($Request->has('promo_code') && !empty($Request->promo_code)) {
                //     // $PromoCode = new PromoCode();
                //     // $PromoCodeData = $PromoCode::where('code', $Request->promo_code)->first();

                //     // if(!empty($PromoCodeData)) {
                //     //     if($PromoCodeData->used == 1) {
                //     //         return response()->json(['status' => true, 'errors' => true, 'message' => 'პრომოკოდი არარის ვალიდური'], 200);
                //     //     } else if($PromoCodeData->status == 0) {
                //     //         return response()->json(['status' => true, 'errors' => true, 'message' => 'პრომოკოდი არარის ვალიდური'], 200);
                //     //     } else {
                //     //         $SendData['promo_status'] = 'Validate';
                //     //         $SendData['promo_code'] = $Request->promo_code;

                //     //         if($PromoCodeData->multiple != 1) {
                //     //             $PromoCodeData->update(['used' => 1]);
                //     //         }

                //     //         $PromoCodeUsed = new PromoCodeUsed();
                //     //         $PromoCodeUsedData  = $PromoCodeUsed::where('phone', $Request->user_phone)->where('code_id', $PromoCodeData->id)->first();

                //     //         if(!empty($PromoCodeUsedData)) {
                //     //             return response()->json(['status' => true, 'errors' => true, 'message' => 'თქვენ უკვე გამოყენებული მოცემული გაქვთ პრომოკოდი'], 200);
                //     //         } else {
                //     //             $PromoCodeUsed = new PromoCodeUsed();
                //     //             $PromoCodeUsed->phone = $Request->user_phone;
                //     //             $PromoCodeUsed->code_id = $PromoCodeData->id;
                //     //             $PromoCodeUsed->save();
                //     //         }
                //     //     }
                //     // } else {
                //     //     return response()->json(['status' => true, 'errors' => true, 'message' => 'პრომოკოდი არარის ვალიდური'], 200);
                //     // }
                //     $SendData['promo_code'] = $Request->promo_code;
                }
                dd($SendData)
                $CrmController = new CrmController();
                $CrmResponse = $CrmController->serviceCrmSend($SendData);
                $CrmResponse = json_decode($CrmResponse);
                if($CrmResponse->success == 'true') {
                    $CrmController->serviceCrmSaveLog($SendData, 'send_to_crm', $CrmResponse);
                    $RedirectUrl = route('actionWebSeccess');
                    return response()->json(['status' => true, 'errors' => false, 'message' => $validator->getMessageBag()->toArray(), 'RedirectUrl' => $RedirectUrl], 200);
                } else {
                    $CrmController->serviceCrmSaveLog($SendData, 'save_error_log', '0');
                    return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
                }
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxGetCarModel(Request $Request) {
        if($Request->isMethod('GET')) {
            $CarMake = new CarMake();
            $CarMakeData = $CarMake::where('name', $Request->car_make)->first();

            $CarModel = new CarModel();
            $CarModelList = $CarModel::where('make_id', $CarMakeData->id)->where('status', 1)->where('deleted_at_int', '!=', 0)->get();

            return response()->json(['status' => true, 'CarModelList' => $CarModelList]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxCheckPromoCode(Request $Request) {
        if($Request->isMethod('GET')) {
            $messages = array(
                'promo_code.required' => 'გთხოვთ შეიყვანოთ პრომოკოდი',
                'user_phone.required' => 'გთხოვთ შეიყვანოთ თქვენი ტელეფონის ნომერი',
            );
            $validator = Validator::make($Request->all(), [
                'promo_code' => 'required|max:255',
                'user_phone' => 'required|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'validate' => false, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $PromoCode = new PromoCode();
                $PromoCodeData = $PromoCode::where('code', $Request->promo_code)->where('status', 1)->first();

                if(!empty($PromoCodeData)) {
                    $PromoCodeUsed = new PromoCodeUsed();
                    $PromoCodeUsedData  = $PromoCodeUsed::where('phone', $Request->user_phone)->where('code_id', $PromoCodeData->id)->first();

                    if(!empty($PromoCodeUsedData)) {
                        return response()->json(['status' => true, 'errors' => true, 'message' => 'თქვენ უკვე გამოყენებული მოცემული გაქვთ პრომოკოდი'], 200);
                    } else {
                        if($PromoCodeData->used == 1) {
                            return response()->json(['status' => true, 'errors' => true, 'message' => 'პრომოკოდი არარის ვალიდური'], 200);
                        } else if($PromoCodeData->status == 0) {
                            return response()->json(['status' => true, 'errors' => true, 'message' => 'პრომოკოდი არარის ვალიდური'], 200);
                        } else {
                            return response()->json(['status' => true, 'message' => 'პრომო კოდი დადასტურებრებულია']);
                        }
                    }
                } else {
                    return response()->json(['status' => true, 'errors' => true, 'message' => 'პრომოკოდი არარის ვალიდური'], 200);
                }
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }
}
