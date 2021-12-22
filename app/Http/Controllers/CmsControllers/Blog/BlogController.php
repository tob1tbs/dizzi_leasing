<?php

namespace App\Http\Controllers\CmsControllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blogs\Blog;

class BlogController extends Controller
{
    //

    public function actionBlog(Request $Request) {
        if (view()->exists('cms.sections.blogs.blog_main')) {

            $Blog = new Blog();
            $BlogList = $Blog::where('deleted_at_int', '!=', 0)->get();

            $data = [
                'blog_list' => $BlogList,
            ];

            return view('cms.sections.blogs.blog_main', $data);
        } else {
            abort('404');
        }
    }

    public function actionBlogAdd(Request $Request) {
        if (view()->exists('cms.sections.blogs.blog_add')) {

            $data = [
            ];

            return view('cms.sections.blogs.blog_add', $data);
        } else {
            abort('404');
        }
    }

    public function actionBlogEdit(Request $Request) {
        if (view()->exists('cms.sections.blogs.blog_edit')) {

            $Blog = new Blog();
            $BlogData = $Blog::find($Request->id);

            $data = [
                'blog_data' => $BlogData,
            ];

            return view('cms.sections.blogs.blog_edit', $data);
        } else {
            abort('404');
        }
    }
}
