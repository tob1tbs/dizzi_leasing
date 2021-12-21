<?php

namespace App\Http\Controllers\CmsControllers\TextPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TextPage\TextPage;

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
}
