<?php

namespace App\Http\Controllers\CmsControllers\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reviews\Review;

use Carbon\Carbon;

class ReviewAjaxController extends Controller
{
    //

    public function ajaxReviewDelete(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->review_id)) {
            $Review = new Review();
            $Review::find($Request->review_id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_at_int' => 0,
                'approve' => 0,
            ]);
            return response()->json(['status' => true, 'message' => 'შეფასება წარმატებით წაიშალა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxReviewStatusChange(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->review_id)) {
            $Review = new Review();
            $Review::find($Request->review_id)->update([
                'approve' => $Request->review_status,
            ]);
            return response()->json(['status' => true, 'message' => 'შეფასება წარმატებით შეიცვალა']);
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

}
