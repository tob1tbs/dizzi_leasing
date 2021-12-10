@extends('cms.layout.layout')

@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-4">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start gx-3 mb-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-title">
                                                    <h6 class="title font-neue">მომხმარებელთა რეგისტრაცია</h6>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="card-tools">
                                                    <label class="form-label">თვე</label>
                                                    <select class="form-control font-neue" id="statistic_month" onchange="RegisterUserChange()">
                                                        @foreach($month_list as $month_key => $month_item)
                                                        <option value="{{ $month_key }}" @if(\Carbon\Carbon::now()->month == $month_key) selected @endif>{{ $month_item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="card-tools">
                                                    <label class="form-label">წელი</label>
                                                    <select class="form-control" id="statistic_year" onchange="RegisterUserChange()">
                                                        @foreach($year_list as $year_item)
                                                        <option value="{{ $year_item }}" @if(\Carbon\Carbon::now()->year == $year_item) selected @endif>{{ $year_item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-sales-ck large pt-4">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                                            <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
                                        </div>
                                        <canvas class="sales-overview-chart chartjs-render-monitor" id="salesOverview" width="860" height="176" style="display: block; width: 860px; height: 176px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start gx-3 mb-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-title">
                                                    <h6 class="title font-neue">განაცხადებები</h6>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="card-tools">
                                                    <label class="form-label">თვე</label>
                                                    <select class="form-control font-neue" id="" onchange="LoanChange()">
                                                        @foreach($month_list as $month_key => $month_item)
                                                        <option value="{{ $month_key }}" @if(\Carbon\Carbon::now()->month == $month_key) selected @endif>{{ $month_item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="card-tools">
                                                    <label class="form-label">წელი</label>
                                                    <select class="form-control" id="" onchange="LoanChange()">
                                                        @foreach($year_list as $year_item)
                                                        <option value="{{ $year_item }}" @if(\Carbon\Carbon::now()->year == $year_item) selected @endif>{{ $year_item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-sales-ck large pt-4">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                                            <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
                                        </div>
                                        <canvas class="sales-overview-chart chartjs-render-monitor" id="salesOverview" width="860" height="176" style="display: block; width: 860px; height: 176px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title-group align-start gx-3 mb-3">
                                            <div class="card-title">
                                                <h6 class="title font-neue">ზოგადი სტატისტიკა</h6>
                                            </div>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="" data-original-title="Total Withdraw"></em>
                                        </div>
                                    </div>
                                    <div class="invest-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="invest-data-history">
                                                    <div class="title font-neue">მომხმარებელთა რაოდენობა</div>
                                                    <div class="amount">{{ $user_count }}</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="invest-data-history">
                                                    <div class="title font-neue">დამატებული მანქანების რაოდენობა</div>
                                                    <div class="amount">{{ $car_count }}</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="invest-data-history">
                                                    <div class="title font-neue">დამატებული ბლოგების რაოდენობა</div>
                                                    <div class="amount">{{ $car_count }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/cms/js/Custom/MainScripts.js') }}"></script>
@endsection