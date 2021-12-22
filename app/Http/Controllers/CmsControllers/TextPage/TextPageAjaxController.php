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
            $TextPage = new TextPage();
            $TextPage::find($Request->page_id)->update([
                'value' => $Request->page_text,
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

            return response()->json(['status' => true, 'message' => 'კოდი წარმატებით წაიშალა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }
}
