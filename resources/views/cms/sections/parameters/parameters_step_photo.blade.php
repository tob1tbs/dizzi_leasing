@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">სექციების ჩამონათვალი</h4>
        </div>  
    </div>
</div>
<div class="card card-preview">
    <div class="card-inner">
        <table class="nk-tb-list nk-tb-ulist font-helvetica-regular">
            <thead>
                <tr class="nk-tb-item nk-tb-head font-helvetica-regular">
                    <th class="nk-tb-col"><span class="sub-text">სურათი</span></th>
                    <th class="nk-tb-col text-right">მოქმედება</th>
                </tr>
            </thead>
            <tbody>
                @foreach($step_list as $step_item)
                <tr class="nk-tb-item">
                    <td class="nk-tb-col">
                        <div class="user-card">
                            <div class="user-info">
                                <img src="{{ url('uploads/step/'.$step_item->photo) }}">
                            </div>
                        </div>
                    </td>
                    <td class="nk-tb-col text-right">
                        <div class="form-group">
                            <span onclick="UpdateStepPhoto({{ $step_item->id }})">სურათის განახლება</span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="PhotoModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue question-heading">კითხვის დამატება</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="photo_form">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">სურათი</label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control" name="photo_new" id="photo_new">
                                    <input type="hidden"  name="photo_hidden" id="photo_hidden">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="photo_id" id="photo_id">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <button type="button" onclick="UpdateStepPhotoSubmit()" class="btn btn-lg btn-primary font-helvetica-regular">შენახვა</button>
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
<script type="text/javascript">
    function UpdateStepPhoto(photo_id) {
        $.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxUpdateStepPhoto",
            type: "GET",
            data: {
                photo_id: photo_id,
            },
            success: function(data) {
                $("#photo_id").val(data['StepData']['id']);
                $("#photo_hidden").val(data['StepData']['photo']);
                $("#PhotoModal").modal('show');
            }
        });
    }

    function UpdateStepPhotoSubmit() {
        var form = $('#photo_form')[0];
        var data = new FormData(form);

        $.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxUpdateStepPhotoSubmit",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data['status'] == true) {
                    Swal.fire({
                        icon: 'success',
                        text: data['message'],
                        timer: 1500,
                    });
                    window.location.reload();
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