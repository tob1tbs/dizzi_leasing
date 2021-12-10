<?php

namespace App\Http\Controllers\WebControllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cars\CarModel;

class CarsAjaxController extends Controller
{
    //

    public function ajaxCarMake(Request $Request) {
        if($Request->isMethod('GET') && !empty($Request->make_id)) { 
            $CarModel = new CarModel();
            $CarModelList = $CarModel::where('make_id', $Request->make_id)->where('status', 1)->where('deleted_at_int', '!=', 0)->get();

            return response()->json(['status' => true, 'CarModelList' => $CarModelList]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }
}
