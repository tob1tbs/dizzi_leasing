<?php

namespace App\Http\Controllers\CmsControllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cars\CarData;
use App\Models\Users\User;

class MainController extends Controller
{
    //

    public function __construct() {

    }

    public function actionMain() {
        if (view()->exists('cms.sections.main.main')) {

            $CarData = new CarData();
            $CarDataCount = $CarData::where('deleted_at_int', '!=', 0)->get()->count();

            $User = new User();
            $UserCount = $User::where('deleted_at_int', '!=', 0)->get()->count();

            $data = [
                'month_list' => $this->getMonthList(),
                'year_list' => $this->getYearList(),
                'car_count' => $CarDataCount,
                'user_count' => $UserCount,
            ];
            return view('cms.sections.main.main', $data);
        } else {
            abort('404');
        }
    }
}
