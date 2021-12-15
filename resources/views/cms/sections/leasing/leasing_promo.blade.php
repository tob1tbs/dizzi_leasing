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

<div class="modal fade" id="PromoModal" style="display: none;" aria-hidden="true">
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
                                        <option value="1">კი</option>
                                        <option value="0">არა</option>
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

	}
</script>
@endsection