<?php

namespace App\Http\Controllers\CmsControllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blogs\Blog;

use Validator;
use Str;

class BlogAjaxController extends Controller
{
    //

    public function ajaxBlogSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი',
            );
            $validator = Validator::make($Request->all(), [
                'title_ge' => 'required|max:255',
                // 'title_en' => 'required|max:255',
                'text_ge' => 'required',
                // 'text_en' => 'required',
                'photo' => 'required',
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $title = [
                    'ge' => $Request->title_ge,
                    'en' => $Request->title_en,
                ];

                $text = [
                    'ge' => $Request->text_ge,
                    'en' => $Request->text_en,
                ];

                if($Request->has('photo')) {
                    $MainPhoto = $Request->photo;
                    $MainPhotoName =  md5(Str::random(20).time().$MainPhoto).'.'.$MainPhoto->getClientOriginalExtension();
                    $MainPhoto->move(public_path('uploads/blog/'), $MainPhotoName);
                }

                $Blog = new Blog();
                $Blog::updateOrCreate(
                    ['id' => $Request->id],
                    [
                        'id' => $Request->id,
                        'title' => json_encode($title),
                        'text' => json_encode($text),
                        'photo' => $MainPhotoName,
                    ]
                );

                return response()->json(['status' => true, 'message' => 'ბლოგი შეინახა']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }
}
