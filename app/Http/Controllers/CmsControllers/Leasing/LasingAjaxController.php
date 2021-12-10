<?php

namespace App\Http\Controllers\CmsControllers\Leasing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Leasing\LeasingParameter;

use Validator;

class LasingAjaxController extends Controller
{
    public function ajaxLeasingParametersSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
            );
            $validator = Validator::make($Request->all(), [
                '*' => 'required',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                foreach($Request->all() as $Key => $Input) {
                    $LeasingParameter = new LeasingParameter();
                    $LeasingParameter::where('key', $Key)->update(['value' => $Input]);
                }
                return response()->json(['status' => true, 'errors' => false, 'message' => 'პარამტრები წარმატებით განახლდა']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }
}
