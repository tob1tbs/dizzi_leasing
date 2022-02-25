@extends('cms.layout.layout')

@section('css')
<link rel="stylesheet" href="{{ url('assets/cms/css/summernote.css') }}">
@endsection

@section('content')
<div class="nk-block nk-block-lg">
    <form id="page_edit">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="page_title">გვერდის დასახელება</label>
                                    <input type="text" class="form-control font-neue" value="{{ $text_page_data->title }}" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="keywords_ge">Meta Keywords (ქართულად)</label>
                                    <input type="text" class="form-control font-neue" value="{{ $text_page_data->keywords_en }}" id="keywords_ge" id="keywords_ge">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="keywords_en">Meta Keywords (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue" value="{{ $text_page_data->keywords_en }}" id="keywords_en" id="keywords_en">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="description_ge">Meta Description (ქართულად)</label>
                                    <input type="text" class="form-control font-neue" value="{{ $text_page_data->description_ge }}" id="description_ge" id="description_ge">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="description_en">Meta Description (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue" value="{{ $text_page_data->description_en }}" id="description_en" id="description_en">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="page_text_ge">გვერდის ტექსტი (ქართულად) *</label>
                                    <textarea class="summernote-basic mt-3 col-span-12 font-helvetica" id="page_text_ge" name="page_text_ge">{{ $text_page_data->value }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="page_text_en">გვერდის ტექსტი (ინგლისურად) *</label>
                                    <textarea class="summernote-basic mt-3 col-span-12 font-helvetica" id="page_text_en" name="page_text_en">{{ $text_page_data->value }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-2">
                                    <button type="button" class="font-neue btn btn-lg btn-primary" onclick="TextPageSubmit()">შენახვა</button>
                                    <input type="hidden" name="page_id" value="{{ $text_page_data->id }}">
                                </div>
                            </div>
                        </div>
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
    function TextPageSubmit() {
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
                        window.location.replace("/cms/text/");
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
