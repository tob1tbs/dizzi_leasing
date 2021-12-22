<?php

namespace App\Http\Controllers\CmsControllers\Parameters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Parameters\TranslateParameter;
use App\Models\Parameters\BasicParameter;
use App\Models\Parameters\ParameterSection;

use Validator;

class ParametersAjaxController extends Controller
{
    //

    public function ajaxTranslateSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'translate_key.unique' => 'მოცემული KEY დაკავებულია',
            );
            $validator = Validator::make($Request->all(), [
                'translate_ge' => 'required|max:255',
                'translate_en' => 'required|max:255',
                'translate_key' => 'required|unique:cms_parameters_translate,key|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $TranslateArray = [
                    'ge' => $Request->translate_ge,
                    'en' => $Request->translate_en,
                ];
                $TranslateParameter = new TranslateParameter();
                $TranslateParameter->key = $Request->translate_key;
                $TranslateParameter->value = json_encode($TranslateArray);
                $TranslateParameter->save();

                return response()->json(['status' => true, 'errors' => false, 'message' => 'თარგმანი წარმატებით დაემატა'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxDeleteTranslate(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->translate_id)) {
                $TranslateParameter = new TranslateParameter();
                $TranslateParameter->find($Request->translate_id)->delete();

                return response()->json(['status' => true, 'message' => 'თარგმანი წარმატებით წაიშალა!'], 200);    
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxTranslateUpdateSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
                'translate_key.unique' => 'მოცემული KEY დაკავებულია',
            );
            $validator = Validator::make($Request->all(), [
                'translate_ge' => 'required|max:255',
                'translate_en' => 'required|max:255',
                'translate_key' => 'required|unique:cms_parameters_translate,key,'.$Request->translate_id.'|max:255',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $TranslateArray = [
                    'ge' => $Request->translate_ge,
                    'en' => $Request->translate_en,
                ];
                $TranslateParameter = new TranslateParameter();
                $TranslateParameter->find($Request->translate_id)->update([
                   'key' => $Request->translate_key,
                   'value' => json_encode($TranslateArray),
                ]);

                return response()->json(['status' => true, 'message' => 'თარგმანი წარმატებით დარედაქტირდა!'], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxBasicParameterSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            foreach($Request->all() as $Key => $Input) {
                $BasicParameter = new BasicParameter();
                $BasicParameter::where('key', $Key)->update(['value' => $Input]);
            }
            return response()->json(['status' => true, 'errors' => false, 'message' => 'პარამტრები წარმატებით განახლდა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxSectionStatusChange(Request $Request) {
        if($Request->isMethod('POST')) {
            $ParameterSection = new ParameterSection();
            $ParameterSection::find($Request->section_id)->update([
                'status' => $Request->section_status
            ]);
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }
}
