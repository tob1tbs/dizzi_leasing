@extends('cms.layout.layout')

@section('css')
<link rel="stylesheet" href="{{ url('assets/cms/css/summernote.css') }}">
@endsection

@section('content')
<div class="nk-block nk-block-lg">
    <form id="cars_form">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-preview">
                    <div class="card-inner">
                        <form id="page_edit" class="row">
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="page_title">გვერდის დასახელება</label>
                                    <input type="text" class="form-control font-neue" value="{{ $text_page_data->title }}" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="page_text">გვერდის ტექსტი</label>
                                    <textarea class="summernote-basic mt-3 col-span-12 font-helvetica" id="{{ $text_page_data->value }}" name="page_text"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-2">
                                    <button type="button" class="font-neue btn btn-lg btn-primary" onclick="TextPageSubmit({{ $text_page_data->id }})">შენახვა</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<link rel="stylesheet" href="{{ url('assets/cms/css/summernote.css') }}" />
<script src="{{ url('assets/cms/js/summernote.js') }}"></script>
<script src="{{ url('assets/cms/js/editors.js') }}"></script>
<script type="text/javascript">
    function TextPageSubmit(id) {
        var form = $('#page_edit')[0];
        var data = new FormData(form);

        $.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxTextPageSubmit",
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
                       Swal.fire({
                            icon: 'success',
                            text: data['message'],
                            timer: 1500,
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            text: data['message'],
                            timer: 1500,
                        });
                        window.location.replace("/cms/blog/");
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
