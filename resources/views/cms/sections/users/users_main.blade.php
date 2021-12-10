@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">მომხმარებელთა ჩამონათვალი</h4>
        </div>    
        <div class="nk-block-head-content">
            <ul class="nk-block-tools g-3">
                <li>
                    <a href="javascript:;" class="btn btn-white btn-outline-light" onclick="UserModal()">
                        <em class="icon ni ni-plus"></em>
                        <span class="font-helvetica-regular">ახალი მომხმარებელი</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="card card-preview">
    <div class="card-inner">
        <table class="datatable-init-export nk-tb-list nk-tb-ulist font-helvetica-regular" data-auto-responsive="false" data-export-title="EXPORT">
            <thead>
                <tr class="nk-tb-item nk-tb-head font-helvetica-regular">
                    <th class="nk-tb-col"><span class="sub-text">სახელი გვარი</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">ტელეფონის ნომერი</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">ელ-ფოსტა</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">წვდომის ჯგუფი</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">ვერიფიკაცია</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">ბოლოს შემოვიდა</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">სტატუსი</span></th>
                    <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                </tr>
            </thead>
            <tbody>
            	@foreach($users_list as $user_item)
                <tr class="nk-tb-item">
                    <td class="nk-tb-col">
                        <div class="user-card">
                            <div class="user-avatar bg-dim-primary d-none d-sm-flex"><span>{{ Str::substr($user_item->name, 0, 1) }}{{ Str::substr($user_item->lastname, 0, 1) }}</span></div>
                            <div class="user-info">
                                <span class="tb-lead">{{ $user_item->name }} {{ $user_item->lastname }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                        <span class="tb-amount">{{ $user_item->phone }}</span>
                    </td>
                    <td class="nk-tb-col tb-col-md"><span>{{ $user_item->email }}</span></td>
                    <td class="nk-tb-col tb-col-lg"><span>{{ $user_item->userRole->title }}</span></td>
                    <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                        <ul class="list-status">
                            <li><em class="icon @if($user_item->verify_phone == 0) text-danger ni ni-cross-circle @else text-success ni ni-check-circle @endif"></em> <span class="@if($user_item->verify_phone == 0) text-danger @else text-success @endif">ტელეფონი</span></li>
                            <li><em class="icon @if($user_item->verify_email == 0) text-danger ni ni-cross-circle @else text-success ni ni-check-circle @endif"></em> <span class="@if($user_item->verify_email == 0) text-danger @else text-success @endif">ელ-ფოსტა</span></li>
                            <li><em class="icon @if($user_item->crm_id == 0) text-danger ni ni-cross-circle @else text-success ni ni-check-circle @endif"></em> <span class="@if($user_item->crm_id == 0) text-danger @else text-success @endif">CRM</span></li>
                        </ul>
                    </td>
                    <td class="nk-tb-col tb-col-lg"><span>{{ $user_item->last_login }}</span></td>
                    <td class="nk-tb-col tb-col-md">
                    	<div class="form-group">
                			<div class="custom-control custom-switch">
                				<input type="checkbox" class="custom-control-input" name="reg-public" id="site-off" value="1" @if($user_item->status == 1) checked @endif onclick="UserStatusChange({{ $user_item->id}}, this)">
                				<label class="custom-control-label" for="site-off"></label>
                			</div>
                		</div>
                    </td>
                    <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr" style="width: 300px;">
                                            <li><a href="{{ route('actionUsersView', $user_item->id) }}"><em class="icon ni ni-focus"></em><span>პროფილი</span></a></li>
                                            <li><a href="javascript:;" onclick="UserEdit({{ $user_item->id }})"><em class="icon ni ni-edit"></em><span>რედაქტირება</span></a></li>
                                            @if($user_item->verify_phone == 0)
                                            <li><a href="javascript:;" onclick="UserVerify(1,{{ $user_item->id }})"><em class="icon ni ni-mobile"></em><span>ტელეფონის ვერიფიკაცია</span></a></li>
                                            @endif
                                            @if($user_item->verify_email == 0)
                                           <li><a href="javascript:;" onclick="UserVerify(2,{{ $user_item->id }})"><em class="icon ni ni-mail-fill"></em><span>ელ-ფოსტის ვერიფიკაცია</span></a></li>
                                            @endif
                                            @if($user_item->crm_id == 0)
                                           <li><a href="javascript:;" onclick="UserSendToCrm({{ $user_item->id }})"><em class="icon ni ni-link-alt"></em><span>CRM ში გაგზავნა</span></a></li>
                                            @endif
                                            <li><a href="javascript:;" onclick="UserRoleChange({{ $user_item->id }})"><em class="icon ni ni-unlock"></em><span>წვდომა</span></a></li>
                                            <li><a href="javascript:;" class="text-danger" onclick="UserDelete({{ $user_item->id }})"><em class="icon ni ni-trash"></em><span>წაშლა</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="VerifyModal" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title font-neue">ვერიფიკაცია</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<em class="icon ni ni-cross"></em>
				</a>
			</div>
			<div class="modal-body">
				<form action="#" class="form-validate is-alter" novalidate="novalidate">
					<div class="form-group">
						<label class="form-label font-helvetica-regular" for="verify_code">ვერიფიკაციის კოდი</label>
						<div class="form-control-wrap">
							<input type="text" class="form-control" name="verify_code" id="verify_code">
						</div>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-lg btn-primary font-helvetica-regular" onclick="VerifyFormSubmit()">დადასტურება</button>
					</div>
					<input type="hidden" name="method" id="verify_method">
					<input type="hidden" name="user_id" id="verify_user_id">
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="UserModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue user-modal-custom-title"></h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="user_form">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="user_name">სახელი</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control user-input" name="user_name" id="user_name">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-user_name"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="user_lastname">გვარი</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control user-input" name="user_lastname" id="user_lastname">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-user_lastname"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="user_bday">დაბადების თარიღი</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control user-input" name="user_bday" id="user_bday">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-user_bday"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="user_personal_number">პირადი ნომერი</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control user-input" name="user_personal_number" id="user_personal_number">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-user_personal_number"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">სქესი</label>
                                <div class="form-control-wrap">
                                    <select class="form-control user-input font-helvetica-regular" name="user_gender" id="user_gender">
                                        @foreach($users_gender_list as $gender_item)
                                        <option value="{{ $gender_item->id }}">{{ $gender_item->value }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-user_gender"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">ტელეფონის ნომერი</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control user-input" name="user_phone" id="user_phone">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-user_phone"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">ელ-ფოსტა</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control user-input" name="user_email" id="user_email">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-user_email"></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <button type="button" onclick="UserSubmit()" class="btn btn-lg btn-primary font-helvetica-regular">შენახვა</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="UserRoleChangeModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue">წვდომის ჯგუფის შეცვლა</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="user_role_change_form">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="user_role_change">წვდომის ჯგუფი</label>
                                <div class="form-control-wrap">
                                    <select class="form-control user-input font-helvetica-regular" name="user_role_change" id="user_role_change">
                                        @foreach($users_role_list as $users_role_item)
                                        <option value="{{ $users_role_item->name }}">{{ $users_role_item->title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-user_role_change"></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_role_change_id" id="user_role_change_id">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <button type="button" onclick="UserRoleChangeSubmit()" class="btn btn-lg btn-primary font-helvetica-regular">შენახვა</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/cms/js/datatable-btns.js') }}"></script>
<script src="{{ url('assets/cms/js/Custom/UserScripts.js') }}"></script>
@endsection