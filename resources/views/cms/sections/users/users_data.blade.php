@extends('cms.layout.layout')

@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title font-neue">
                            	მომხმარებელი / <strong class="text-primary small">{{ $users_data->name }} {{ $users_data->lastname }}</strong>
                            </h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline font-helvetica-regular">
                                    <li>ID: <span class="text-base">{{ $users_data->id }}</span></li>
                                    <li>ბოლოს შემოვიდა: <span class="text-base">{{ $users_data->last_login }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="javascript:;" onclick="GoBack()" class="btn btn-outline-light bg-white d-none d-sm-inline-flex font-helvetica-regular">
                            	<em class="icon ni ni-arrow-left"></em>
                            	<span>უკან დაბრუნება</span>
                            </a>
                            <a href="javascript:;" onclick="GoBack()" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none font-helvetica-regular">
                            	<em class="icon ni ni-arrow-left"></em>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card font-helvetica-regular">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personalInformation">
                                        	<em class="icon ni ni-user-circle"></em>
                                        	<span>პირადი ინფორმაცია</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content"> 
	                                <div class="card-inner tab-pane active" id="personalInformation">
	                                    <div class="nk-block">
	                                        <div class="nk-block-head">
	                                            <h5 class="title font-neue">მომხმარებლის პირადი ინფორმაცია</h5>
	                                        </div>
	                                        <div class="profile-ud-list font-helvetica-regular" style="max-width: 100%;"> 
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider">
	                                                	<span class="profile-ud-label">სქესი</span>
	                                                	<span class="profile-ud-value">{{ $users_data->userGender->value }}</span>
	                                                </div>
	                                            </div>
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider">
	                                                	<span class="profile-ud-label">სახელი გვარი</span>
	                                                	<span class="profile-ud-value">{{ $users_data->name }} {{ $users_data->lastname }}</span>
	                                                </div>
	                                            </div>
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider">
	                                                	<span class="profile-ud-label">დაბადების თარიღი</span>
	                                                	<span class="profile-ud-value">{{ $users_data->bday }}</span>
	                                                </div>
	                                            </div>
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider">
	                                                	<span class="profile-ud-label">პირადი ნომერი</span>
	                                                	<span class="profile-ud-value">{{ $users_data->personal_number }}</span>
	                                                </div>
	                                            </div>
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider">
	                                                	<span class="profile-ud-label">მობილურის ნომერი</span>
	                                                	<span class="profile-ud-value">{{ $users_data->phone }}</span>
	                                                </div>
	                                            </div>
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider">
	                                                	<span class="profile-ud-label">ელ-ფოსტა</span>
	                                                	<span class="profile-ud-value">{{ $users_data->email }}</span>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="nk-block">
	                                        <div class="nk-block-head nk-block-head-line"><h6 class="title overline-title text-base">Additional Information</h6></div>
	                                        <div class="profile-ud-list">
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider"><span class="profile-ud-label">Joining Date</span><span class="profile-ud-value">08-16-2018 09:04PM</span></div>
	                                            </div>
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider"><span class="profile-ud-label">Reg Method</span><span class="profile-ud-value">Email</span></div>
	                                            </div>
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider"><span class="profile-ud-label">Country</span><span class="profile-ud-value">United State</span></div>
	                                            </div>
	                                            <div class="profile-ud-item">
	                                                <div class="profile-ud wider"><span class="profile-ud-label">Nationality</span><span class="profile-ud-value">United State</span></div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
                            	</div>
                            </div>
                            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl toggle-screen-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                                <div class="card-inner-group" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <div class="card-inner">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar lg bg-primary font-helvetica-regular"><span>{{ Str::substr($users_data->name, 0, 1) }}{{ Str::substr($users_data->lastname, 0, 1) }}</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner card-inner-sm">
                                                            <ul class="btn-toolbar justify-center gx-1">
                                                                <li>
                                                                    <a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-shield-off"></em></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-mail"></em></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-download-cloud"></em></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-bookmark"></em></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="btn btn-trigger btn-icon text-danger"><em class="icon ni ni-na"></em></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-inner">
                                                            <div class="overline-title-alt mb-2">In Account</div>
                                                            <div class="profile-balance">
                                                                <div class="profile-balance-group gx-4">
                                                                    <div class="profile-balance-sub">
                                                                        <div class="profile-balance-amount">
                                                                            <div class="number">2,500.00 <small class="currency currency-usd">USD</small></div>
                                                                        </div>
                                                                        <div class="profile-balance-subtitle">Invested Amount</div>
                                                                    </div>
                                                                    <div class="profile-balance-sub">
                                                                        <span class="profile-balance-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                                        <div class="profile-balance-amount"><div class="number">1,643.76</div></div>
                                                                        <div class="profile-balance-subtitle">Profit Earned</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner">
                                                            <div class="row text-center">
                                                                <div class="col-4">
                                                                    <div class="profile-stats"><span class="amount">23</span><span class="sub-text">Total Order</span></div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="profile-stats"><span class="amount">20</span><span class="sub-text">Complete</span></div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="profile-stats"><span class="amount">3</span><span class="sub-text">Progress</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner">
                                                            <h6 class="overline-title-alt mb-2">Additional</h6>
                                                            <div class="row g-3">
                                                                <div class="col-6"><span class="sub-text">User ID:</span><span>UD003054</span></div>
                                                                <div class="col-6"><span class="sub-text">Last Login:</span><span>15 Feb, 2019 01:02 PM</span></div>
                                                                <div class="col-6"><span class="sub-text">KYC Status:</span><span class="lead-text text-success">Approved</span></div>
                                                                <div class="col-6"><span class="sub-text">Register At:</span><span>Nov 24, 2019</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner">
                                                            <h6 class="overline-title-alt mb-3">Groups</h6>
                                                            <ul class="g-1">
                                                                <li class="btn-group">
                                                                    <a class="btn btn-xs btn-light btn-dim" href="#">investor</a><a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
                                                                </li>
                                                                <li class="btn-group">
                                                                    <a class="btn btn-xs btn-light btn-dim" href="#">support</a><a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
                                                                </li>
                                                                <li class="btn-group">
                                                                    <a class="btn btn-xs btn-light btn-dim" href="#">another tag</a><a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: auto; height: 815px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    	<div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    	<div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
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
<script src="{{ url('assets/cms/js/Custom/UserScripts.js') }}"></script>
@endsection