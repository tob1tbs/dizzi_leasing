@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">ავტომობილების ჩამონათვალი</h4>
        </div>    
        <div class="nk-block-head-content">
            <ul class="nk-block-tools g-3">
                <li>
                    <a href="{{ route('actionCarsAdd') }}" class="btn btn-white btn-outline-light">
                        <em class="icon ni ni-plus"></em>
                        <span class="font-helvetica-regular">ახალი ავტომობილი</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="nk-body">
    <div class="card card-bordered card-full">
        <div class="nk-tb-list">
            <div class="nk-tb-item nk-tb-head font-helvetica-regular">
                <div class="nk-tb-col">
                    <span>ID</span>
                </div>
                <div class="nk-tb-col">
                    <span>ავტორი</span>
                </div>
                <div class="nk-tb-col">
                    <span>შეფასება</span>
                </div>
                <div class="nk-tb-col tb-col-sm">
                    <span>სტატუსი</span>
                </div>
                <div class="nk-tb-col">
                    <span>&nbsp;</span>
                </div>
            </div>
            @foreach($review_list as $review_item)
            
            @endforeach
        </div>
    </div>
</div>
@endsection