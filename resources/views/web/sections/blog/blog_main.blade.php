@extends('web.layout.layout')

@section('content')
<main>
	<section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 50px 0;">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="blog-post-widget">
                            <div class="row gy-4 ">
                                @foreach($blog_list as $blog_item)
                                
                                @endforeach
                            </div>
                            <div class="row mt-55">
                                <div class="col-12">
                                    {{ $blog_list->links('vendor.pagination.bootstrap-4.blade') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ps-xl-5 mt-5 mt-lg-0">
                        <div class="blog-sidebar-widget ps-lg-2">
                            <div class="widget-subscribe">
                                <h4 class="widget-title mb-15 neue">{{ trans('site.search_blog') }}</h4>
                                <form action="{{ route('actionWebBlog') }}" class="mt-15">
                                    <input class="form-control helvetica-regular" type="text" name="search_query" value="{{ request()->search_query }}">
                                    <button class="theme-btn w-100 mt-20 neue" type="submit">{{ trans('site.search') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
<style type="text/css">
    ::placeholder {
        font-family: 'HelveticaRegular';
    }
</style>
@endsection