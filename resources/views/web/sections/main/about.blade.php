@extends('web.layout.layout')

@section('content')
<main>
    <section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 30px 0;">
        <div class="container">
            <div class="description-widget">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('assets/web/img/leadership/img-1.png') }}">
                    </div>
                    <div class="col-md-8">
                        <div class="desc-text pl-lg-10">
                            <p class="mt-35">Izzi Bank’s journey started with a single belief to connect people,
                                places and
                                possibilities by doing things others said could not be done. Anchored on this
                                belief,
                                the Bank was founded in 2017 and we are, to date, headquartered in the Mauritius
                                International Financial Centre with a representative office in United States.
                            </p>
                            <p class="mt-20">Izzi Bank's core banking and transactional capabilities are also
                                complemented. Izzi
                                experienced team and its regional foundation are complemented by the belief and
                                trust
                                our clients have in our ability to connect them to a global banking network to
                                seamlessly achieve their financial aspirations.
                            </p>
                            <p class="mt-20">Izzi Bank's core banking and transactional capabilities are also
                                complemented. Izzi
                                experienced team and its regional foundation are complemented by the belief and
                                trust
                                our clients have in our ability to connect them to a global banking network to
                                seamlessly achieve their financial aspirations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="leadership-area pt-50 pb-50 bg_disable">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-sm-12">
                    <div class="section-title  wow fadeInRight">
                        <span class="short-title mt-0">Leadership</span>
                        <h2 class="mb-0">Meet our leadership team</h2>
                    </div>
                </div>
            </div>
            <div class="row pt-40 gy-md-0 gy-4">
                <div class="col-lg-3">
                    <div class="single-leadership-widget wow fadeInUp " data-wow-delay="0.1s">
                        <a href="#">
                            <img src="{{ url('assets/web/img/leadership/img-1.png') }}" alt="leader-1">
                            <div class="leader-info">
                                <h5>Eldridge Robles</h5>
                                <p>Co-Founder, Conis</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-leadership-widget wow fadeInUp " data-wow-delay="0.3s">
                        <a href="#">
                            <img src="{{ url('assets/web/img/leadership/img-2.png') }}" alt="leader-2">
                            <div class="leader-info">
                                <h5>Eldridge Robles</h5>
                                <p>Co-Founder, Conis</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-leadership-widget wow fadeInUp " data-wow-delay="0.5s">
                        <a href="#">
                            <img src="{{ url('assets/web/img/leadership/img-3.png') }}" alt="leader-3">
                            <div class="leader-info">
                                <h5>Eldridge Robles</h5>
                                <p>Co-Founder, Conis</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-leadership-widget wow fadeInUp " data-wow-delay="0.5s">
                        <a href="#">
                            <img src="{{ url('assets/web/img/leadership/img-3.png') }}" alt="leader-3">
                            <div class="leader-info">
                                <h5>Eldridge Robles</h5>
                                <p>Co-Founder, Conis</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection