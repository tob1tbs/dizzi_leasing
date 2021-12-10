@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">ავტომობილის პარამეტრების ჩამონათვალი</h4>
        </div>    
        <div class="nk-block-head-content">
            <ul class="nk-block-tools g-3">
                <li>
                    <a href="javascript:;" class="btn btn-white btn-outline-light" onclick="CarOptionAddModal()">
                        <em class="icon ni ni-plus"></em>
                        <span class="font-helvetica-regular">ახალი პარამეტრი</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="nk-block nk-block-lg">
    <div class="card card-preview">
        <div class="card-inner">
            <table class="table table-bordered font-neue">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">პარამეტრის KEY</th>
                        <th scope="col">პარამეტრის დასახელება (ქართულად)</th>
                        <th scope="col">პარამეტრის დასახელება (ინგლისურად)</th>
                        <th scope="col">პარამეტრის ტიპი</th>
                        <th scope="col">მოქმედება</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    @foreach($car_option_list as $option_item)
                    <tr id="option_item-{{ $option_item->id }}">
                        <th scope="row">{{ $option_item->id }}</th>
                        <td>{{ $option_item->key }}</td>
                        <td>{{ json_decode($option_item->value, true)['ge'] }}</td>
                        <td>{{ json_decode($option_item->value, true)['en'] }}</td>
                        <td>{{ $option_item->type }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu" style="">
                                    <ul class="link-list-plain">
                                        @switch($option_item->type)
                                        @case('select')
                                        <li><a href="javascript:;" onclick="OptionValueGet({{ $option_item->id }})">ქვეპარამეტრები</a></li>
                                        @break
                                        @endswitch
                                        @if($option_item->key != 'price')
                                        <li><a href="javascript:;" onclick="CarOptionDelete({{ $option_item->id }})">წაშლა</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
</div>
<div class="modal fade" id="CarOptionAddModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue car-parameter-title"></h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="option_form">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-control-wrap">
                                <label class="form-label">პარამეტრის KEY</label>
                                <input type="text" class="form-control font-neue translate-input error-option_key" name="option_key" id="option_key" value="">
                                <span class="text-danger font-helvetica-regular font-italic error-text error-option_key"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-control-wrap">
                                <label class="form-label">პარამეტრის ტიპი</label>
                                <select class="form-control font-neue" name="option_type" id="option_type">
                                    <option value="input">Input</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="select">Select</option>
                                    <option value="date">Date</option>
                                </select>
                                <span class="text-danger font-helvetica-regular font-italic error-text error-option_type"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-control-wrap">
                                <label class="form-label">დასახელება (ქართულად)</label>
                                <input type="text" class="form-control font-neue translate-input error-option_title_ge" name="option_title_ge" id="option_title_ge" value="">
                                <span class="text-danger font-helvetica-regular font-italic error-text error-option_title_ge"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-control-wrap">
                                <label class="form-label">დასახელება (ინგლისურად)</label>
                                <input type="text" class="form-control font-neue translate-input error-option_title_en" name="option_title_en" id="option_title_en" value="">
                                <span class="text-danger font-helvetica-regular font-italic error-text error-option_title_en"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-3">
                            <button class="btn btn-success font-neue" type="button" onclick="OptionSubmit()">შენახვა</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="CarOptionValueModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue">ქვეპარამეტრების ჩამონათვალი</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered font-neue">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">დასახელება (ქართულად)</th>
                                    <th scope="col">დასახელება (ინგლისურად)</th>
                                    <th scope="col">მოქმედება</th>
                                </tr>
                            </thead>
                            <tbody class="option-value-list">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12" style="margin-top: 20px;">
                        <form id="option_value_form" class="row">
                            <div class="col-12">
                                <span class="font-neue" style="font-size: 16px;">ახალი ქვეპარამეტრის დამატება</span>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="form-control-wrap">
                                    <label class="form-label">ქვეპარამეტრის დასახელება (ქართულად)</label>
                                    <input type="text" class="form-control font-neue translate-input error-option_value_ge" name="option_value_ge" id="option_value_ge" value="">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-option_value_ge"></span>
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="form-control-wrap">
                                    <label class="form-label">ქვეპარამეტრის დასახელება (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue translate-input error-option_value_en" name="option_value_en" id="option_value_en" value="">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-option_value_en"></span>
                                </div>
                            </div>
                            <input type="hidden" name="value_option_id" id="value_option_id">
                            <input type="hidden" name="value_option_key" id="value_option_key">
                            <div class="col-lg-2 col-12">
                                <div class="form-control-wrap" style="margin-top: 31px;">
                                    <label class="form-label"></label>
                                    <button class="btn btn-success" type="button" onclick="OptionValueSubmit()">
                                        <em class="icon ni ni-plus-round"></em>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/cms/js/Custom/CarScripts.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script type="text/javascript">
    $( function() {
        $("#sortable").sortable({
            axis: 'y',
            update: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ route('ajaxOptionSort') }}'
                });
            }
        });
    });
</script>
@endsection