<?php

namespace App\Http\Controllers\CmsControllers\Leasing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Leasing\LeasingParameter;

class LasingController extends Controller
{
    //

    public function actionLeasingParameters(Request $Request) {
        if (view()->exists('cms.sections.leasing.leasing_parameters')) {

            $LeasingParameter = new LeasingParameter();
            $LeasingParametersList = $LeasingParameter::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'back_leasing_parameters' => $LeasingParametersList,
            ];

            return view('cms.sections.leasing.leasing_parameters', $data);
        } else {
            abort('404');
        }
    }
}
