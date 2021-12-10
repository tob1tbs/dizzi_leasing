<?php

namespace App\Http\Controllers\WebControllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reviews\Review;

use Validator;

class MainAjaxController extends Controller
{
    //
    public function ajaxSaveReview(Request $Request) {
        $messages = array(
            'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
        );
        $validator = Validator::make($Request->all(), [
            'review_name' => 'required',
            'review_phone' => 'required',
            'review_message' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
        } else {
            $Review = new Review();
            $Review->name = $Request->review_name;
            $Review->phone = $Request->review_phone;
            $Review->message = $Request->review_message;
            $Review->save();

            return response()->json(['status' => true, 'message' => 'თქვენი შეფასება მიღებულია']);
        }
    }
}
