<?php

namespace App\Http\Controllers\WebControllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cars\CarMake;
use App\Models\Cars\CarOption;
use App\Models\Cars\CarOptionValue;
use App\Models\Cars\CarData;
use App\Models\Cars\CarParameter;
use App\Models\Cars\CarGallery;

class CarsController extends Controller
{
    //

    public function actionWebCars(Request $Request) {
        if (view()->exists('web.sections.cars.cars_main')) {

            $CarMake = new CarMake();
            $CarMakeList = $CarMake::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $CarOption = new CarOption();
            $CarOptionList = $CarOption::where('deleted_at_int', '!=', 0)->orderBy('sortable', 'ASC')->get()->toArray();

            $OptionArray = [];

            foreach($CarOptionList as $OptionItem) {
                $CarOptionValue = new CarOptionValue();
                $CarOptionValueList = $CarOptionValue::where('option_id', $OptionItem['id'])->where('deleted_at_int', '!=', 0)->get()->toArray();

                $OptionArray[$OptionItem['id']] = [
                    'name' => json_decode($OptionItem['value']),
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

            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)->where('status', 1);

            if($Request->has('car_make') && !empty($Request->car_make)) {
                $CarList = $CarList->where('make', $Request->car_make);
            }

            if($Request->has('car_model') && !empty($Request->car_model)) {
                $CarList = $CarList->where('model', $Request->car_model);
            }

            if($Request->has('price_from') && !empty($Request->price_from)) {
                $CarList = $CarList->where('price', '>=', $Request->price_from);
            }

            if($Request->has('price_to') && !empty($Request->price_to)) {
                $CarList = $CarList->where('price', '<=', $Request->price_to);
            }

            if($Request->has('year_from') && !empty($Request->year_from)) {
                $CarList = $CarList->where('year', '>=', $Request->year_from);
            }

            if($Request->has('year_to') && !empty($Request->year_to)) {
                $CarList = $CarList->where('year', '<=', $Request->year_to);
            }

            if($Request->has('engine_from') && !empty($Request->engine_from)) {
                $CarList = $CarList->where('engine', '>=', $Request->engine_from);
            }

            if($Request->has('engine_to') && !empty($Request->engine_to)) {
                $CarList = $CarList->where('engine', '<=', $Request->engine_to);
            }

            if($Request->has('millage_from') && !empty($Request->millage_from)) {
                // $CarList = $CarList->where('millage', '>=', $Request->millage_from);
            }

            if($Request->has('millage_to') && !empty($Request->millage_to)) {
                // $CarList = $CarList->where('millage', '<=', $Request->millage_to);
            }

            $CarList = $CarList->get()
                                ->load('carMake')
                                ->load('carModel')
                                ->load('carParameter')
                                ->toArray();

            $CarArray = [];

            foreach($CarList as $CarItem) {
                $CarArray[$CarItem['id']] = [
                    'car_id' => $CarItem['id'],
                    'car_make' => $CarItem['car_make']['name'],
                    'car_model' => $CarItem['car_model']['name'],
                    'car_photo' => $CarItem['photo'],
                    'car_price' => $CarItem['price'],
                    'car_year' => $CarItem['year'],
                    'parameters' => $CarItem['car_parameter'],
                ];
            }           
  
          $data = [
                'car_make_list' => $CarMakeList,
                'car_option_array' => $OptionArray,
                'car_list' => $CarArray,
                'car_year' => $this->getYear(),
                'car_engine' => $this->getEngineVolume(),
            ];
            return view('web.sections.cars.cars_main', $data);
        } else {
            abort('404');
        }
    }

    public function actionCarsView(Request $Request) {
        if (view()->exists('web.sections.cars.cars_view')) {

            $CarData = new CarData();
            $CarItem = $CarData::findOrFail($Request->id)->load('carMake')
                                                         ->load('carModel')
                                                         ->load('carParameter');

            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)->where('status', 1)->get();

            $CarParameter = new CarParameter();
            $CarParameterList = $CarParameter::where('car_id', $Request->id)->where('deleted_at_int', '!=', 0)->get()
            ->load('carOption')
            ->load('carOptionValue')
            ->load('carOptionValueId');

            $ParameterArray = [];

            foreach($CarParameterList as $ParameterItem) {
                $ParameterArray[$ParameterItem['id']] = [
                    'label' => json_decode($ParameterItem->carOption->value),
                    'value' => '',
                    'json' => '',
                ];

                if(!empty($ParameterItem->carOptionValue)) {
                    $ParameterArray[$ParameterItem['id']]['value'] = json_decode($ParameterItem->carOptionValue->value);
                    $ParameterArray[$ParameterItem['id']]['json'] = 1;
                } else {
                    $ParameterArray[$ParameterItem['id']]['value'] = $ParameterItem->value;
                    $ParameterArray[$ParameterItem['id']]['json'] = 0;
                }
            }

            $CarGallery = new CarGallery();
            $CarGalleryList = $CarGallery::where('car_id', $Request->id)->where('deleted_at_int', '!=', 0)->get();

            $data = [
                'car_parameter_list' => $ParameterArray,
                'car_item' => $CarItem,
                'car_gallery' => $CarGalleryList,
                'car_list' => $CarList,
            ];

            return view('web.sections.cars.cars_view', $data);
        } else {
            abort('404');
        }
    }
}
