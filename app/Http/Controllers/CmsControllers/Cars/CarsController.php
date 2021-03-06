<?php

namespace App\Http\Controllers\CmsControllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cars\CarOption;
use App\Models\Cars\CarOptionValue;
use App\Models\Cars\CarMake;
use App\Models\Cars\CarData;
use App\Models\Cars\CarParameter;
use App\Models\Cars\CarGallery;


class CarsController extends Controller
{
    //

    public function __construct() {

    }

    public function actionCars() {
   		if (view()->exists('cms.sections.cars.cars_main')) {

            $CarDataArray = [];
            $CarParametersArray = [];
            
            $CarData = new CarData();
            $CarDataList = $CarData::where('deleted_at_int', '!=', 0)->get()->load('carMake')
                                                                            ->load('carModel')
                                                                            ->toArray();

            foreach($CarDataList as $CarItem) {

                $CarParameter = new CarParameter();
                $CarParameterList = $CarParameter::where('car_id', $CarItem['id'])
                                                                            ->get()
                                                                            ->load('carOption')
                                                                            ->load('carOptionValue')
                                                                            ->toArray();
                foreach($CarParameterList as $CarParameterItem) {
                    if($CarParameterItem['car_option']['type'] != 'input') {
                        $CarParametersArray[$CarParameterItem['car_option']['id']] = [
                            'key' => $CarParameterItem['key'],
                            'option_name' => json_decode($CarParameterItem['car_option']['value']),
                            'option_value' => json_decode($CarParameterItem['car_option_value']['value']),
                        ];
                    } else {
                        $CarParametersArray[$CarParameterItem['car_option']['id']] = [
                            'key' => $CarParameterItem['key'],
                            'option_name' => json_decode($CarParameterItem['car_option']['value']),
                            'option_value' => $CarParameterItem['value'],
                        ];
                    }
                }

                $CarDataArray[$CarItem['id']] = [
                    'id' => $CarItem['id'],
                    'make' => $CarItem['car_make']['name'],
                    'model' => $CarItem['car_model']['name'],
                    'data' => $CarItem,
                    'options' => $CarParametersArray,
                ];
            }

            $data = [
                'car_data_list' => $CarDataArray,
            ];

            return view('cms.sections.cars.cars_main', $data);
        } else {
            abort('404');
        }     
    }

    public function actionCarsAdd() {
        if (view()->exists('cms.sections.cars.cars_add')) {

            $CarOption = new CarOption();
            $CarOptionList = $CarOption::where('deleted_at_int', '!=', 0)->orderBy('sortable', 'ASC')->get()->toArray();

            $OptionArray = [];

            foreach($CarOptionList as $OptionItem) {
                $CarOptionValue = new CarOptionValue();
                $CarOptionValueList = $CarOptionValue::where('option_id', $OptionItem['id'])->where('deleted_at_int', '!=', 0)->get()->toArray();

                $OptionArray[$OptionItem['id']] = [
                    'name' => json_decode($OptionItem['value'])->ge,
                    'type' => $OptionItem['type'],
                    'key' => $OptionItem['key'],
                    'option' => [],
                ];

                foreach($CarOptionValueList as $OptionValue) {
                    if($OptionValue['option_id'] == $OptionItem['id']) { 
                        $OptionArray[$OptionItem['id']]['option'][] = $OptionValue;
                    }
                }
            }

            $CarMake = new CarMake();
            $CarMakeList = $CarMake::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $data = [
                'option_list' => $OptionArray, 
                'car_make_list' => $CarMakeList, 
                'car_engine' => $this->getEngineVolume(),
                'car_year' => $this->getYear(),
            ];

            return view('cms.sections.cars.cars_add', $data);
        } else {
            abort('404');
        }
    }

    public function actionCarsEdit(Request $Request) {
        if (view()->exists('cms.sections.cars.cars_edit')) {

            $CarOption = new CarOption();
            $CarOptionList = $CarOption::where('deleted_at_int', '!=', 0)->orderBy('sortable', 'ASC')->get()->toArray();

            $OptionArray = [];

            foreach($CarOptionList as $OptionItem) {
                $CarOptionValue = new CarOptionValue();
                $CarOptionValueList = $CarOptionValue::where('option_id', $OptionItem['id'])->where('deleted_at_int', '!=', 0)->get()->toArray();

                $OptionArray[$OptionItem['id']] = [
                    'name' => json_decode($OptionItem['value'])->ge,
                    'type' => $OptionItem['type'],
                    'key' => $OptionItem['key'],
                    'option' => [],
                ];

                foreach($CarOptionValueList as $OptionValue) {
                    if($OptionValue['option_id'] == $OptionItem['id']) { 
                        $OptionArray[$OptionItem['id']]['option'][] = $OptionValue;
                    }
                }
            }

            $CarMake = new CarMake();
            $CarMakeList = $CarMake::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $CarData = new CarData();
            $CarDataItem = $CarData::find($Request->id);

            $data = [
                'option_list' => $OptionArray, 
                'car_make_list' => $CarMakeList, 
                'car_engine' => $this->getEngineVolume(),
                'car_year' => $this->getYear(),
                'car_data' => $CarDataItem,
            ];

            return view('cms.sections.cars.cars_edit', $data);
        } else {
            abort('404');
        }
    }
 
    public function actionCarsOptions() {
        if (view()->exists('cms.sections.cars.cars_options')) {

            $CarOption = new CarOption();
            $CarOptionList = $CarOption::where('deleted_at_int', '!=', 0)->orderBy('sortable', 'ASC')->get();

            $data = [
                'car_option_list' => $CarOptionList,
            ];

            return view('cms.sections.cars.cars_options', $data);
        } else {
            abort('404');
        }     
    }
}
