@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">წვდომის ჯგუფების ჩამონათვალი</h4>
        </div>    
        <div class="nk-block-head-content">
            <ul class="nk-block-tools g-3">
                <li>
                    <a href="javascript:;" class="btn btn-white btn-outline-light" onclick="UserRoleModal()">
                        <em class="icon ni ni-plus"></em>
                        <span class="font-helvetica-regular">ახალი წვდომის ჯგუფი</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="card card-preview">
    <div class="card-inner">
        <table class="datatable-init nk-tb-list nk-tb-ulist font-helvetica-regular" data-auto-responsive="false">
            <thead>
                <tr class="nk-tb-item nk-tb-head font-helvetica-regular">
                    <th class="nk-tb-col"><span class="sub-text">ჯგუფის დასახელება</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">ჯგუფის (KEY)</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">სტატუსი</span></th>
                    <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                </tr>
            </thead>
            <tbody>
            	@foreach($user_role_list as $user_role_item)
                <tr class="nk-tb-item">
                    <td class="nk-tb-col">
                        <div class="user-card">
                            <div class="user-info">
                                <span class="tb-lead">{{ $user_role_item->title }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                        <span class="tb-amount">{{ $user_role_item->name }}</span>
                    </td>
                    <td class="nk-tb-col tb-col-md">
                    	<div class="form-group">
                			<div class="custom-control custom-switch">
                				@if($user_role_item->id != 1 AND $user_role_item->id != 2)
                				<input type="checkbox" class="custom-control-input" name="reg-public" id="site-off" value="1" @if($user_role_item->status == 1) checked @endif onclick="RoleStatusChange({{ $user_role_item->id}}, this)">
                				<label class="custom-control-label" for="site-off"></label>
                				@endif
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
                                            <li><a href="javascript:;" onclick="RolePermissions({{ $user_role_item->id }})"><em class="icon ni ni-unlock"></em><span>უფლებები</span></a></li>
                                            <li><a href="javascript:;" onclick="RoleEdit({{ $user_role_item->id }})"><em class="icon ni ni-edit"></em><span>რედაქტირება</span></a></li>
                                            <li><a href="javascript:;" class="text-danger" onclick="RoleDelete({{ $user_role_item->id }})"><em class="icon ni ni-trash"></em><span>წაშლა</span></a></li>
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
<div class="modal fade" id="RoleModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue role-modal-custom-title"></h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="role_form">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="role_title">დასახელება</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control role-input" name="role_title" id="role_title">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-role_title"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="role_name">KEY</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control role-input" name="role_name" id="role_name">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-role_name"></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="role_id" id="role_id">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <button type="button" onclick="RoleSubmit()" class="btn btn-lg btn-primary font-helvetica-regular">შენახვა</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="PermissionModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue role-modal-custom-title"></h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="permission_form">
                    <div class="row permission-list">
                        
                    </div>
                    <div class="row">
                    	<div class="col-lg-3">
                    		<button class="btn btn-success font-neue" type="button" onclick="PermissionSubmit()">შენახვა</button>
                    	</div>
                    </div>
                   	<input type="hidden" name="permission_role_id" id="permission_role_id">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/cms/js/Custom/UserScripts.js') }}"></script>
@endsection