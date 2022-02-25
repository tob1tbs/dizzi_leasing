<?php

namespace App\Http\Controllers\CmsControllers\TextPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TextPage\TextPage;
use App\Models\Main\Faq;

class TextPageAjaxController extends Controller
{
    //

    public function ajaxTextPageSubmit(Request $Request) {
        if($Request->isMethod('POST')) {    

            $arr = [
                'ge' => $Request->page_text_ge,
                'en' => $Request->page_text_en,
            ];

            $meta_arr = [
                'ge' => $Request->description_ge,
                'en' => $Request->description_en,
            ];

            $kwd_arr = [
                'ge' => $Request->keywords_ge,
                'en' => $Request->keywords_en,
            ];


            $title = [
                'ge' => $Request->title_ge,
                'en' => $Request->title_en,
            ];

            $TextPage = new TextPage();
            $TextPage::find($Request->page_id)->update([
                'title' => json_encode($title),
                'value' => json_encode($arr),
                'description' => json_encode($meta_arr),
                'keywords' => json_encode($kwd_arr),
            ]);

            return response()->json(['status' => true, 'message' => 'კოდი წარმატებით წაიშალა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    } 

    public function ajaxQuestionStatusChange(Request $Request) {
        if($Request->isMethod('POST')) {
            $Faq = new Faq();
            $Faq::find($Request->question_id)->update([
                'status' => $Request->question_status,
            ]);

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxQuestionSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $title = [
                'ge' => $Request->question_title_ge,
                'en' => $Request->question_title_en,
            ];

            $text = [
                'ge' => $Request->question_text_ge,
                'en' => $Request->question_text_en,
            ];
            $Faq = new Faq();
            $Faq::updateOrCreate(
                ['id' => $Request->question_id],
                [
                    'id' => $Request->question_id,
                    'title' => json_encode($title),
                    'value' => json_encode($text),
                ]
            );

            return response()->json(['status' => true, 'message' => 'შეკითხვა შეინახა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxEditQuestion(Request $Request) {
        if($Request->isMethod('GET')) {
            $Faq = new Faq();
            $FaqData = $Faq::find($Request->question_id);

            return response()->json(['status' => true, 'FaqData' => $FaqData]);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }

    public function ajaxQuestionDelete(Request $Request) {
        if($Request->isMethod('POST')) {
            $Faq = new Faq();
            $Faq::find($Request->question_id)->update([
                'deleted_at_int' => 0,
            ]);

            return response()->json(['status' => true, 'message' => 'შეკითხვა შეინახა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }
}
