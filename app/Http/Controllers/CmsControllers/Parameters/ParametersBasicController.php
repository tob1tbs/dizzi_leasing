<?php

namespace App\Http\Controllers\CmsControllers\Parameters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Parameters\BasicParameter;
use App\Models\Parameters\LanguageList;
use App\Models\Parameters\TranslateParameter;
use App\Models\Parameters\ParameterSection;
use App\Models\Parameters\StepPhoto;

class ParametersBasicController extends Controller
{
    //

    public function actionParametersBasicMain(Request $Request) {
        if (view()->exists('cms.sections.parameters.parameters_basic_main')) {

            $BasicParameter = new BasicParameter();
            $BasicParameterList = $BasicParameter::where('deleted_at_int', '!=', 0)->orderBy('sortable', 'ASC')->get();

            $LanguageList = new LanguageList();
            $LanguageListData = $LanguageList::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'parameters_list' => $BasicParameterList,
                'language_list' => $LanguageListData,
            ];

            return view('cms.sections.parameters.parameters_basic_main', $data);
        } else {
            abort('404');
        }
    }

    public function actionParametersTranslate(Request $Request) {
        if (view()->exists('cms.sections.parameters.parameters_translate')) {

            $TranslateParameter = new TranslateParameter();
            $TranslateParametersList = $TranslateParameter::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'translate_list' => $TranslateParametersList,
            ];

            return view('cms.sections.parameters.parameters_translate', $data);
        } else {
            abort('404');
        }
    }

    public function actionParametersSections(Request $Request) {
        if (view()->exists('cms.sections.parameters.parameters_section')) {

            $ParameterSection = new ParameterSection();
            $ParameterSectionList = $ParameterSection::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'section_list' => $ParameterSectionList,
            ];

            return view('cms.sections.parameters.parameters_section', $data);
        } else {
            abort('404');
        }
    }

    public function actionStepPhoto(Request $Request) {
        if (view()->exists('cms.sections.parameters.parameters_step_photo')) {

            $StepPhoto = new StepPhoto();
            $StepPhotoList = $StepPhoto::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'step_list' => $StepPhotoList,
            ];

            return view('cms.sections.parameters.parameters_step_photo', $data);
        } else {
            abort('404');
        }
    }
}
