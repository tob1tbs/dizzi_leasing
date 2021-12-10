<?php

namespace App\Http\Controllers\CmsControllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cars\CarOption;
use App\Models\Cars\CarOptionValue;
use App\Models\Cars\CarModel;
use App\Models\Cars\CarData;
use App\Models\Cars\CarGallery;
use App\Models\Cars\CarParameter;

use Validator;
use Str;

use Carbon\Carbon;

class CarsAjaxController extends Controller
{
    //

    public function ajaxOptionSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'option_key.unique' => 'მოცემული KEY დაკავებულია',
            );
            $validator = Validator::make($Request->all(), [
                'option_key' => 'required|unique:cms_car_options_list,key|max:255',
                'option_type' => 'required|max:255',
                'option_title_ge' => 'required|max:255',
                'option_title_en' => 'required|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $OptionArray = [
                    'ge' => $Request->option_title_ge,
                    'en' => $Request->option_title_en,
                ];
                $CarOption = new CarOption();
                $CarOption->type = $Request->option_type;
                $CarOption->value = json_encode($OptionArray, JSON_UNESCAPED_UNICODE);
                $CarOption->key = $Request->option_key;
                $CarOption->save();

                return response()->json(['status' => true, 'errors' => false, 'message' => 'პარამეტრი წარმატებით დაემატა'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxOptionValueGet(Request $Request) {
        if($Request->isMethod('GET') && !empty($Request->option_id)) {
            $CarOption = new CarOption();
            $CarOptionData = $CarOption::find($Request->option_id);

            $CarOptionValue = new CarOptionValue();
            $CarOptionValueList = $CarOptionValue::where('option_id', $Request->option_id)->where('deleted_at_int', '!=', 0)->get();

            return response()->json(['status' => true, 'CarOptionValueList' => $CarOptionValueList, 'CarOptionData' => $CarOptionData]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxOptionValueSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
            );
            $validator = Validator::make($Request->all(), [
                'option_value_ge' => 'required|max:255',
                'option_value_en' => 'required|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $OptionValueArray = [
                    'ge' => $Request->option_value_ge,
                    'en' => $Request->option_value_en,
                ];

                $CarOptionValue = new CarOptionValue();

                $CarOptionValue->option_id = $Request->value_option_id;
                $CarOptionValue->key = $Request->value_option_key;
                $CarOptionValue->value = json_encode($OptionValueArray, JSON_UNESCAPED_UNICODE);
                $CarOptionValue->save();

                $CarOptionValueList = $CarOptionValue::where('option_id', $Request->value_option_id)->where('deleted_at_int', '!=', 0)->get();

                return response()->json(['status' => true, 'CarOptionValueList' => $CarOptionValueList]);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxOptionValueDelete(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->value_id)) {
            if($Request->value_id != 14) {

                $CarOptionValue = new CarOptionValue();
                $CarOptionValueData = $CarOptionValue::find($Request->value_id);

                $CarOptionValueData->update([
                    'deleted_at' => Carbon::now(),
                    'deleted_at_int' => 0,
                ]);

                $CarOptionValueList = $CarOptionValue::where('option_id', $CarOptionValueData->option_id)->where('deleted_at_int', '!=', 0)->get();

                return response()->json(['status' => true, 'CarOptionValueList' => $CarOptionValueList]);
            } else {
                 return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxCarOptionDelete(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->option_id)) {
            $CarOption = new CarOption();
            $CarOption::find($Request->option_id)->delete();

            return response()->json(['status' => true, 'errors' => false, 'message' => 'პარამეტრი წარმატებით წაიშალა'], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxCarMake(Request $Request) {
        if($Request->isMethod('GET') && !empty($Request->make_id)) { 
            $CarModel = new CarModel();
            $CarModelList = $CarModel::where('make_id', $Request->make_id)->where('status', 1)->where('deleted_at_int', '!=', 0)->get();

            return response()->json(['status' => true, 'CarModelList' => $CarModelList]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxOptionSort(Request $Request) {
        if($Request->isMethod('POST')) {
            foreach($Request->option_item as $key => $Item) {
                $Sortable = $key + 1;
                $CarOption = new CarOption();
                $CarOption::where('id', intval($Item))->update(['sortable' => intval($Sortable)]);
            }  
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxCarsAddSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $DescriptionArray = [
                'ge' => $Request->description_ge,
                'en' => $Request->description_en,
            ];

            if($Request->has('photo')) {
                $MainPhoto = $Request->photo;
                $MainPhotoName =  md5(Str::random(20).time().$MainPhoto).'.'.$MainPhoto->getClientOriginalExtension();
                $MainPhoto->move(public_path('uploads/cars/main/'), $MainPhotoName);
            }

            $CarData = new CarData();
            $CarData->make = $Request->make;
            $CarData->model = $Request->model;
            $CarData->engine = $Request->car_engine_volume;
            $CarData->price = $Request->car_price;
            $CarData->year = $Request->car_year;
            $CarData->millage = $Request->car_millage;
            $CarData->photo = $MainPhotoName;
            $CarData->description = json_encode($DescriptionArray, JSON_UNESCAPED_UNICODE);
            $CarData->save();

            if($Request->has('gallery_photo')) {
                foreach ($Request->gallery_photo as $GalleryPhotoItem) {
                    $Photo = $GalleryPhotoItem;
                    $PhotoName =  md5(Str::random(20).time().$GalleryPhotoItem).'.'.$GalleryPhotoItem->getClientOriginalExtension();
                    $Photo->move(public_path('uploads/cars/'.$CarData->id.'/gallery/'), $PhotoName);

                    $CarGallery = new CarGallery();
                    $CarGallery->photo = $PhotoName;
                    $CarGallery->car_id = $CarData->id;
                    $CarGallery->save();
                }
            }

            foreach ($Request->option as $Key => $Value) {
                
                $CarOptionValue = new CarOptionValue();
                $CarOptionData = $CarOptionValue::where('key', $Key)->first();

                if(!empty($Value)) {
                    $CarParameter = new CarParameter();
                    $CarParameter->key = $Key;
                    $CarParameter->value = $Value;
                    $CarParameter->car_id = $CarData->id;
                    $CarParameter->option_id = $CarOptionData['id'];
                    $CarParameter->save();
                }
            }

            return response()->json(['status' => true, 'errors' => false, 'message' => 'ავტომობილი წარმატებით დაემატა'], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxCarStatusChange(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->car_id)) {
            $CarData = new CarData();
            $CarData::find($Request->car_id)->update([
                'status' => $Request->car_status,
            ]);
            return response()->json(['status' => true,], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxCarDelete(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->car_id)) {
            $CarData = new CarData();
            $CarData::find($Request->car_id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_at_int' => 0,
                'status' => 0,
            ]);
            return response()->json(['status' => true, 'message' => 'მანქანა წარმატებით წაიშალა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxDeleteGalleryPhoto(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->photo_id)) {
            $CarGallery = new CarGallery();
            $CarGallery::find($Request->photo_id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_at_int' => 0,
                'status' => 0,
            ]);
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }
}
