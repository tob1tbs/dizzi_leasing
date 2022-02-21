<?php

namespace App\Http\Controllers\WebControllers\Leasing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Leasing\LeasingParameter;
use App\Models\Cars\CarData;
use App\Models\Cars\CarMake;

use App\Models\TextPage\TextPage;

class LeasingController extends Controller
{
    //
    public function actionWebSeccess(Request $Request) {
        if (view()->exists('web.sections.leasing.success')) {
            $data = [ ];
            return view('web.sections.leasing.success', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebLeasing(Request $Request) {
        if (view()->exists('web.sections.leasing.leasing')) {

            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)
                                                                ->where('status', 1)
                                                                ->limit(4)
                                                                ->get()
                                                                ->load('carMake')
                                                                ->load('carModel')
                                                                ->load('carParameter')
                                                                ->toArray();
            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $LeasingParameter = new LeasingParameter();
            $LeasingParametersList = $LeasingParameter::where('deleted_at_int', '!=', 0)->get();
            
            $LeasingArray = [];

            foreach($LeasingParametersList as $ParameterItem) {
                $LeasingArray[$ParameterItem['key']] = $ParameterItem['value'];
            }


            $TextPage = new TextPage();
            $TextPageList = $TextPage::where('deleted_at_int', '!=', 0)->get()->toArray();

            $TextPageArray = [];

            foreach($TextPageList as $TextKey => $TextValue) {
                $TextPageArray[$TextValue['slug']] = $TextValue['value'];
            }

            $SeoData = [
                'title_ge' => 'ავტო ლიზინგი',
                'description_ge' => 'სწრაფი და მარტივი ავტო ლიზინგი',
                'keywords_ge' => 'kwd',
            ];

            $data = [
                'leasing_data' => $LeasingArray,
                'car_list' => $CarList,
                'text_list' => $TextPageArray,
                'seo_data' => $SeoData,
            ];

            return view('web.sections.leasing.leasing', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebBackLeasing(Request $Request) {
        if (view()->exists('web.sections.leasing.backleasing')) {

            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)
                                                                ->where('status', 1)
                                                                ->limit(4)
                                                                ->get()
                                                                ->load('carMake')
                                                                ->load('carModel')
                                                                ->load('carParameter')
                                                                ->toArray();
            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $LeasingParameter = new LeasingParameter();
            $LeasingParametersList = $LeasingParameter::where('deleted_at_int', '!=', 0)->get();
            
            $LeasingArray = [];

            foreach($LeasingParametersList as $ParameterItem) {
                $LeasingArray[$ParameterItem['key']] = $ParameterItem['value'];
            }


            $TextPage = new TextPage();
            $TextPageList = $TextPage::where('deleted_at_int', '!=', 0)->get()->toArray();

            $TextPageArray = [];

            foreach($TextPageList as $TextKey => $TextValue) {
                $TextPageArray[$TextValue['slug']] = $TextValue['value'];
            }

            $SeoData = [
                'title_ge' => 'Leaseback',
                'description_ge' => 'The fastest leasing service in town',
                'keywords_ge' => 'kwd',
            ];

            $data = [
                'leasing_data' => $LeasingArray,
                'car_list' => $CarList,
                'text_list' => $TextPageArray,
                'seo_data' => $SeoData,
            ];

            return view('web.sections.leasing.backleasing', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebLeasingForm(Request $Request) {
        if (view()->exists('web.sections.leasing.leasing_form')) {

            $steering_wheel = $this->getGetSteringWheel();
            $fuel_type = $this->getGetFuel();
            $car_body = $this->getGetCarBody();
            $car_gearbox = $this->getGetGearBox();
            $year_list = $this->getYear();
            $engine_volume = $this->getEngineVolume();

            $CarMake = new CarMake();
            $CarMakeList = $CarMake::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $SeoData = [
                'title_ge' => 'ავტო ლიზინგი',
                'description_ge' => 'სწრაფი და მარტივი ავტო ლიზინგი',
                'keywords_ge' => 'kwd',
            ];

            $data = [
                'steering_wheel' => $steering_wheel,
                'fuel_type' => $fuel_type,
                'car_body' => $car_body,
                'car_gearbox' => $car_gearbox,
                'year_list' => $year_list,
                'engine_volume' => $engine_volume,
                'car_make' => $CarMakeList,
                'seo_data' => $SeoData,
            ];

            return view('web.sections.leasing.leasing_form', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebBackLeasingForm(Request $Request) {
        if (view()->exists('web.sections.leasing.backleasing_form')) {

            $steering_wheel = $this->getGetSteringWheel();
            $fuel_type = $this->getGetFuel();
            $car_body = $this->getGetCarBody();
            $car_gearbox = $this->getGetGearBox();
            $year_list = $this->getYear();
            $engine_volume = $this->getEngineVolume();

            $CarMake = new CarMake();
            $CarMakeList = $CarMake::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $SeoData = [
                'title_ge' => 'უკულიზინგი',
                'description_ge' => 'სწრაფი და მარტივი ავტო ლიზინგი',
                'keywords_ge' => 'kwd',
            ];

            $data = [
                'steering_wheel' => $steering_wheel,
                'fuel_type' => $fuel_type,
                'car_body' => $car_body,
                'car_gearbox' => $car_gearbox,
                'year_list' => $year_list,
                'engine_volume' => $engine_volume,
                'car_make' => $CarMakeList,
                'seo_data' => $SeoData,
            ];

            return view('web.sections.leasing.backleasing_form', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebTaxiLeasing(Request $Request) {
        if (view()->exists('web.sections.leasing.taxileasing')) {

            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)
                                                                ->where('status', 1)
                                                                ->limit(4)
                                                                ->get()
                                                                ->load('carMake')
                                                                ->load('carModel')
                                                                ->load('carParameter')
                                                                ->toArray();
            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $LeasingParameter = new LeasingParameter();
            $LeasingParametersList = $LeasingParameter::where('deleted_at_int', '!=', 0)->get();
            
            $LeasingArray = [];

            foreach($LeasingParametersList as $ParameterItem) {
                $LeasingArray[$ParameterItem['key']] = $ParameterItem['value'];
            }

            
            $TextPage = new TextPage();
            $TextPageList = $TextPage::where('deleted_at_int', '!=', 0)->get()->toArray();

            $TextPageArray = [];

            foreach($TextPageList as $TextKey => $TextValue) {
                $TextPageArray[$TextValue['slug']] = $TextValue['value'];
            }

            $SeoData = [
                'title_ge' => 'Taxi Leasing',
                'description_ge' => 'If you want to make money with your daily work and you need a car',
                'keywords_ge' => 'kwd',
            ];

            $data = [
                'leasing_data' => $LeasingArray,
                'car_list' => $CarList,
                'text_list' => $TextPageArray,
                'seo_data' => $SeoData,
            ];

            return view('web.sections.leasing.taxileasing', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebTaxiLeasingForm(Request $Request) {
        if (view()->exists('web.sections.leasing.taxileasing_form')) {

            $steering_wheel = $this->getGetSteringWheel();
            $fuel_type = $this->getGetFuel();
            $car_body = $this->getGetCarBody();
            $car_gearbox = $this->getGetGearBox();
            $year_list = $this->getYear();
            $engine_volume = $this->getEngineVolume();

            $CarMake = new CarMake();
            $CarMakeList = $CarMake::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $SeoData = [
                'title_ge' => 'ტაქსი ლიზინგი',
                'description_ge' => 'სწრაფი და მარტივი ავტო ლიზინგი',
                'keywords_ge' => 'kwd',
            ];

            $data = [
                'steering_wheel' => $steering_wheel,
                'fuel_type' => $fuel_type,
                'car_body' => $car_body,
                'car_gearbox' => $car_gearbox,
                'year_list' => $year_list,
                'engine_volume' => $engine_volume,
                'car_make' => $CarMakeList,
                'seo_data' => $SeoData,
            ];

            return view('web.sections.leasing.taxileasing_form', $data);
        } else {
            abort('404');
        }
    }
}
