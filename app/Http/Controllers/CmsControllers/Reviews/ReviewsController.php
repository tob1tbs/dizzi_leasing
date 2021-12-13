<?php

namespace App\Http\Controllers\CmsControllers\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reviews\Review;

class ReviewsController extends Controller
{
    //
    public function __construct() {

    }

    public function actionReviews(Request $Request) {
        if (view()->exists('cms.sections.review.review_main')) {

            $Review = new Review();
            $ReviewList = $Review::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'review_list' => $ReviewList,
            ];

            return view('cms.sections.review.review_main', $data);
        } else {
            abort('404');
        }
    }
}
