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
        <table class="datatable-init nk-tb-list nk-tb-ulist font-helvetica-regular" data-auto-responsive="false">
            <thead>
                <tr class="nk-tb-item nk-tb-head font-helvetica-regular">
                    <th class="nk-tb-col"><span class="sub-text">გვერდის დასახელება</span></th>
                    <th class="nk-tb-col nk-tb-col-tools text-right">სტატუსი</th>
                </tr>
            </thead>
            <tbody>
                @foreach($section_list as $section_item)
                <tr class="nk-tb-item">
                    <td class="nk-tb-col">
                        <div class="user-card">
                            <div class="user-info">
                                <span class="tb-lead">{{ $section_item->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="nk-tb-col nk-tb-col-tools">
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection