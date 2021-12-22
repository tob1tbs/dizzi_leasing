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
            @foreach($faq_list as $faq_item)
            <tr class="nk-tb-item">
                <td class="nk-tb-col">
                    <div class="user-card">
                        <div class="user-info">
                            <span class="tb-lead"></span>
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
                                        <li><a href=""><em class="icon ni ni-edit"></em><span>რედაქტირება</span></a></li>
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
@endsection

@section('js')

@endsection