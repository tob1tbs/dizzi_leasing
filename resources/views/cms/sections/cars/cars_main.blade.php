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
                    <span>ავტომობილი</span>
                </div>
                <div class="nk-tb-col">
                    <span>ფასი</span>
                </div>
                <div class="nk-tb-col tb-col-sm">
                    <span>სტატუსი</span>
                </div>
                <div class="nk-tb-col">
                    <span>&nbsp;</span>
                </div>
            </div>
            @foreach($car_data_list as $car_item)
            <div class="nk-tb-item">
                <div class="nk-tb-col">
                    <span>{{ $car_item['id'] }}</span>
                </div>
                <div class="nk-tb-col">
                    <div class="align-center">
                        <div class="user-avatar user-avatar-sm bg-light">
                            <span>
                                <img src="{{ url('uploads/cars/main/'.$car_item['data']['photo']) }}">
                            </span>
                        </div>
                        <span class="tb-sub ml-2">{{ $car_item['make'] }} <span class="d-none d-md-inline">- {{ $car_item['model'] }}</span></span>
                    </div>
                </div>
                <div class="nk-tb-col">
                    <span class="tb-sub tb-amount">{{ $car_item['data']['price'] }}<span>$</span></span>
                </div>
                <div class="nk-tb-col tb-col-sm">
                    <div class="form-group">
                        <div class="custom-control custom-switch checked">
                            <input type="checkbox" class="custom-control-input" name="reg-public" id="site-off" value="1" @if($car_item['data']['status'] == 1) checked @endif onclick="CarStatusChange({{ $car_item['id'] }}, this)">
                            <label class="custom-control-label" for="site-off"></label>
                        </div>
                    </div>
                </div>
                <div class="nk-tb-col nk-tb-col-action">
                    <div class="dropdown">
                        <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false">
                            <em class="icon ni ni-chevron-right"></em>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs" style="">
                            <ul class="link-list-plain font-neue">
                                <!-- <li><a href="{{ route('actionCarsEdit', $car_item['id']) }}">რედაქტირება</a></li> -->
                                <li><a href="javascript:;" class="text-danger" onclick="CarDelete({{ $car_item['id'] }})"><span>წაშლა</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/cms/js/Custom/CarScripts.js') }}"></script>
@endsection