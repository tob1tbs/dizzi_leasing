<?php

namespace App\Http\Controllers\CmsControllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Users\User;

use Carbon\Carbon;

class MainAjaxController extends Controller
{
    //
    public function ajaxGetMonthRegisteredUsers(Request $Request) {
        
        $UserCountArray = [];

        $ParseDate = $Request->statistic_year.'-'.$Request->statistic_month.'-1';
        $ParseDate = carbon::parse($ParseDate);

        for ($i = 1; $i <= $ParseDate->daysInMonth; $i++) { 
            
            $Date = $Request->statistic_year.'-'.$Request->statistic_month.'-'.$i;
            $Date = carbon::parse($Date);

            $User = new User();
            $UserCount = $User::where('deleted_at_int', '!=', 0)->whereDate('created_at', carbon::parse($Date))->get()->count();
            $TotalUserCount = $User::where('deleted_at_int', '!=', 0)->get()->count();

            $Day = sprintf("%02d", $i);

            $UserCountArray[$i] = [$UserCount];
        }

        return response()->json(['status' => true, 'UserCountArray' => $UserCountArray, 'TotalUserCount' => $TotalUserCount]);
    }
}
