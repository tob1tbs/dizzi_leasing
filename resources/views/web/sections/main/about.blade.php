@extends('web.layout.layout')

@section('content')
@php
    $vissible = 0;
@endphp
<main>
    <section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 30px 0;">
        <div class="container">
            <div class="description-widget">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('assets/web/img/banner/about.png') }}">
                    </div>
                    <div class="col-md-8">
                        <div class="desc-text pl-lg-10">
                            <h4 class="neue">ჩვენ შესახებ</h4>
                            <p class="mt-35">კომპანია „დიზი“ დაარსებულია და იმართება საერთაშორისო ავტო სალიზინგო ბაზარზე მრავალწლიანი გამოცდილების მქონე პროფესიონალთა გუნდის მიერ.
                            </p>
                            <p class="mt-20">ჩვენი მიზანია, მოკლე ვადაში, გავხდეთ ერთ-ერთი წამყვანი სალიზინგო კომპანია საქართველოს ბაზარზე თანამედროვე ტექნოლოგიების დანერგვის დახმარებით, რომელიც საშუალებას გვაძლევს გავუწიოთ მომხმარებლებს უმაღლესი ხარისხის მომსახურეობა, რომელიც დაეყრდნობა ადამიანურ ღირებულებებსა და გულახდილობის პრინციპებს.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($vissible != 0)
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
    @endif
</main>
@endsection