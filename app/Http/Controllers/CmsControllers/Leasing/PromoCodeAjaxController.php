<?php

namespace App\Http\Controllers\CmsControllers\Leasing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Leasing\PromoCode;

use Validator;

class PromoCodeAjaxController extends Controller
{
    //
    public function ajaxPromoSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'unique' => 'პრომოკოდის ველი უნდა იყოს უნიკალური',
            );
            $validator = Validator::make($Request->all(), [
                '*' => 'required',
                'promo_code' => 'required|unique:cms_promo_codes,code|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $PromoCode = new PromoCode();
                $PromoCode->code = $Request->promo_code;
                $PromoCode->multiple = $Request->promo_multiple;
                $PromoCode->save();

                return response()->json(['status' => true, 'errors' => false, 'message' => 'პრომოკოდი წარმატებით დაემატა'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxPromoDelete(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->promo_id)) {
            $PromoCode = new PromoCode();
            $PromoCode::find($Request->promo_id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_at_int' => 0,
                'status' => 0,
            ]);
            return response()->json(['status' => true, 'message' => 'კოდი წარმატებით წაიშალა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }
}
