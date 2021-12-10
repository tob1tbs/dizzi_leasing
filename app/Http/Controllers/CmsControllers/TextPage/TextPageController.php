<?php

namespace App\Http\Controllers\CmsControllers\TextPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextPageController extends Controller
{
    //
    public function actionTextPages(Request $Request) {
        if (view()->exists('cms.sections.text.text_main')) {

            $data = [
                
            ];

            return view('cms.sections.text.text_main', $data);
        } else {
            abort('404');
        }
    }
}
