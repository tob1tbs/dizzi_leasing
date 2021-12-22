<?php

namespace App\Http\Controllers\WebControllers\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blogs\Blog;

use Session;

class BlogController extends Controller
{
    //

    public function actionWebBlog(Request $Request) {
        if (view()->exists('web.sections.blog.blog_main')) {

            $Blog = new Blog();
            $BlogList = $Blog::where('deleted_at_int', '!=', 0)->where('status', 1);

            if($Request->has('search_query') && !empty($Request->search_query)) {
                $BlogList->whereJsonContains('title', [Session::get('locale') => $Request->search_query]);
            }

            $BlogList = $BlogList->get()->toArray();

            $data = [
                'blog_list' => $BlogList
            ];
            return view('web.sections.blog.blog_main', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebBlogView(Request $Request) {
        if (view()->exists('web.sections.blog.blog_view')) {

            $Blog = new Blog();
            $BlogData = $Blog::findOrFail($Request->id);

            $data = [
                'blog_data' => $BlogData
            ];
            return view('web.sections.blog.blog_view', $data);
        } else {
            abort('404');
        }
    }
}
