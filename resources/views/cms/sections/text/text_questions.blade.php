@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">სექციების ჩამონათვალი</h4>
        </div> 
        <div class="nk-block-head-content">
            <ul class="nk-block-tools g-3">
                <li>
                    <a href="javascript:;" onclick="AddQuestion()" class="btn btn-white btn-outline-light">
                        <em class="icon ni ni-plus"></em>
                        <span class="font-helvetica-regular">ახალი კითხვის დამატება</span>
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
                    <th class="nk-tb-col"><span class="sub-text">დასახელება</span></th>
                    <th class="nk-tb-col nk-tb-col-tools text-right">სტატუსი</th>
                    <th class="nk-tb-col nk-tb-col-tools text-right">მოქემდება</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')

@endsection