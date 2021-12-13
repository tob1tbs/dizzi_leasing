<?php

namespace App\Http\Controllers\CmsControllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blogs\Blog;

class BlogAjaxController extends Controller
{
    //

    public function ajaxBlogSubmit(Request $Request) {
        dd($Request->all());
    }
}
