<?php

namespace App\Http\Controllers\WebControllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

class MainAjaxController extends Controller
{
    //
    public function ajaxSaveReview(Request $Request) {
        $messages = array(
            'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
        );
        $validator = Validator::make($Request->all(), [
            'review_rate' => 'required',
        ], $messages);

        if ($validator->fails()) {

        } else {
            
        }
    }
}
