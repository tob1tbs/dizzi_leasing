@extends('web.layout.layout')

@section('content')
<main>
    <section class="pb-40 bg_white" style="padding: 50px 0 50px 0;">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="blog-post-widget">
                            <div class="row gy-4 ">
                                @foreach($blog_list as $blog_item)
                                <div class="col-md-6">
                                    <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.3s">
                                        <div class="blog-img">
                                            <img src="{{ url('uploads/blog/'.$blog_item->photo) }}" alt="blog-img">
                                            <!-- <div class="catagory yellow-bg"> -->
                                                
                                            <!-- </div> -->
                                        </div>
                                        <div class="blog-content">
                                            <h4 class="helvetica-regular" style="font-size: 18px;"><a href="{{ route('actionWebBlogView', $blog_item->id) }}">{{ json_decode($blog_item->title)->{app()->getLocale()} }}</a>
                                            </h4>
                                            <div class="post-info">
                                                <div class="post-date">
                                                    <img src="{{ url('assets/web/img/blog/calendar-outline.svg') }}" alt="calendar">
                                                    <span>{{ Carbon\Carbon::parse($blog_item->created_at)->format('D-M-Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row mt-55">
                                <div class="col-12">
                                    {{ $blog_list->links('vendor.pagination.bootstrap-4') }}
                                </div>
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

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #f0c019;
        border-color: #dee2e6;
    }

    .page-link {
        color: #000;
    }
</style>
@endsection