<?php

namespace App\Http\Controllers\CmsControllers\TextPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TextPage\TextPage;
use App\Models\Main\Faq;

class TextPageController extends Controller
{
    //
    public function actionTextPages(Request $Request) {
        if (view()->exists('cms.sections.text.text_main')) {

            $TextPage = new TextPage();
            $TextPageList = $TextPage::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'page_list' => $TextPageList,  
            ];

            return view('cms.sections.text.text_main', $data);
        } else {
            abort('404');
        }
    }

    public function actionTextPagesEdit(Request $Request) {
        if (view()->exists('cms.sections.text.text_edit')) {

            $TextPage = new TextPage();
            $TextPageData = $TextPage::where('id', $Request->id)->firstOrFail();

            $data = [
                'text_page_data' => $TextPageData,
            ];

            return view('cms.sections.text.text_edit', $data);
        } else {
            abort('404');
        }
    }

    public function actionTextQuestions(Request $Request) {
        if (view()->exists('cms.sections.text.text_questions')) {

            $Faq = new Faq();
            $FaqData = $Faq::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'faq_list' => $FaqData,
            ];

            return view('cms.sections.text.text_questions', $data);
        } else {
            abort('404');
        }
    }
}
