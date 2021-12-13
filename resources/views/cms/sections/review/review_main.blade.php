@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">მომხმარებელთა შეფასებები</h4>
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
            <div class="nk-tb-item">
                <div class="nk-tb-col">
                    <span>{{ $review_item->id }}</span>
                </div>
                <div class="nk-tb-col">
                    <span class="tb-sub tb-amount">{{ $review_item->name }}</span>
                </div>
                <div class="nk-tb-col">
                    <span class="tb-sub tb-amount">{{ $review_item->message }}</span>
                </div>
                <div class="nk-tb-col tb-col-sm">
                    <div class="form-group">
                        <div class="custom-control custom-switch checked">
                            <input type="checkbox" class="custom-control-input" name="reg-public" id="site-off" value="1" @if($review_item->approve == 1) checked @endif onclick="ChangeReviewStatusChange({{ $review_item->id }}, this)">
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
                                <li><a href="javascript:;" class="text-danger" onclick="ReviewDelete({{ $review_item->id }})"><span>წაშლა</span></a></li>
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
<script type="text/javascript">
	function ChangeReviewStatusChange() {
	
	}

	function ReviewDelete(review_id) {
		Swal.fire({
        title: 'ნამდვილად გსურთ შეფასების წაშლა?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'წაშლა',
        cancelButtonText: 'გათიშვა',
    }).then((result) => {
      if (result.isConfirmed) {
      	$.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxReviewDelete",
            type: "POST",
            data: {
                review_id: review_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data['status'] == true) {
                	
                } else {
                    Swal.fire({
                      icon: 'error',
                      text: data['message'],
                    })
                }
            }
        });
      }
    })
	}
</script>
@endsection