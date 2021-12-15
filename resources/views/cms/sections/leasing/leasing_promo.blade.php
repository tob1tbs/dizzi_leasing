@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">პრომოკოდების ჩამონათვალი</h4>
        </div>    
        <div class="nk-block-head-content">
            <ul class="nk-block-tools g-3">
                <li>
                    <a href="javascript:;" onclick="NewPromo()" class="btn btn-white btn-outline-light">
                        <em class="icon ni ni-plus"></em>
                        <span class="font-helvetica-regular">ახალი პრომოკოდი</span>
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
                    <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">პრომოკოდი</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">მრავალჯერადი</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">სტატუსი</span></th>
                    <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                </tr>
            </thead>
            <tbody>
            	@foreach($promo_code_list as $code_item)
                <tr class="nk-tb-item">
                    <td class="nk-tb-col">
                        <div class="user-card">
                            <div class="user-info">
                                <span class="tb-lead">{{ $code_item->id }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="nk-tb-col tb-col-lg"><span>{{ $code_item->code }}</span></td>
                    <td class="nk-tb-col tb-col-lg"><span>
                    	@if($code_item->multiple == 1)
                    		კი
                    	@else 
                    		არა
                    	@endif
                    </span></td>
                    <td class="nk-tb-col tb-col-md">
                    	<div class="form-group">
                			<div class="custom-control custom-switch">
                				<input type="checkbox" class="custom-control-input" name="reg-public" id="site-off" value="1" @if($code_item->status == 1) checked @endif onclick="PromoStatusChange({{ $code_item->id}}, this)">
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
                                            <li><a href="javascript:;" class="text-danger" onclick="PromoDelete({{ $code_item->id }})"><em class="icon ni ni-trash"></em><span>წაშლა</span></a></li>
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
<div class="modal fade" id="PromoModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue role-modal-custom-title">ახალი პრომოკოდის დამატება</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="promocode_form">
                    <div class="row">
                    	<div class="col-lg-12 mb-3">
	                        <div class="form-group">
	                            <label class="form-label" for="full-name">პრომო კოდი</label>
	                            <div class="form-control-wrap">
	                                <input type="text" class="form-control user-input" name="promo_code" id="promo_code">
	                                <span class="text-danger font-helvetica-regular font-italic error-text error-promo_code"></span>
	                            </div>
	                        </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">მრავალჯერადი</label>
                                <div class="form-control-wrap">
                                    <select class="form-control user-input font-helvetica-regular" name="promo_multiple" id="promo_multiple">
                                        <option value="0">არა</option>
                                        <option value="1">კი</option>
                                    </select>
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-promo_multiple"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-lg-3">
                    		<button class="btn btn-success font-neue" type="button" onclick="PromoSubmit()">შენახვა</button>
                    	</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	function NewPromo() {
		$("#PromoModal").modal('show');
	}

	function PromoSubmit() {
		var form = $('#promocode_form')[0];
	    var data = new FormData(form);

	    $.ajax({
	        dataType: 'json',
	        url: "/cms/ajax/ajaxPromoSubmit",
	        type: "POST",
	        data: data,
	        enctype: 'multipart/form-data',
	        processData: false,
	        contentType: false,
	        cache: false,
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        success: function(data) {
	            if(data['status'] == true) {
	            	if(data['errors'] == true) {
		                $(".user-input").removeClass('border-danger');
		                $(".error-text").html('');
		                $.each(data['message'], function(key, value) {
		                    $('#'+key).addClass('border-danger');
		                    $('.error-'+key).html('').html(value);
		                })
	                } else {
	                    Swal.fire({
	                        icon: 'success',
	                        text: data['message'],
	                        timer: 1500,
	                    });
	                    location.reload();
	                }
	            } else {
	                Swal.fire({
	                  icon: 'error',
	                  text: data['message'],
	                })
	            }
	        }
	    });
	}
</script>
@endsection