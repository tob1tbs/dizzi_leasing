<?php

namespace App\Http\Controllers\CmsControllers\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    //
    public function __construct() {

    }

    public function actionReviews(Request $Request) {
        if (view()->exists('cms.sections.review.review_main')) {

            $data = [];

            return view('cms.sections.review.review_main', $data);
        } else {
            abort('404');
        }
    }
}
