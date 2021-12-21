<?php

namespace App\Http\Controllers\CmsControllers\TextPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TextPage\TextPage;

class TextPageAjaxController extends Controller
{
    //

    public function ajaxTextPageSubmit(Request $Request) {
        dd($Request->all());
    } 
}
