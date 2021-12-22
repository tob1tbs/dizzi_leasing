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
                    <th class="nk-tb-col"><span class="sub-text">გვერდის დასახელება</span></th>
                    <th class="nk-tb-col">სტატუსი</th>
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
                    <td class="nk-tb-col">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="reg-public" id="section_{{ $section_item->id }}" value="1" @if($section_item->status == 1) checked @endif onclick="SectionStatusChange({{ $section_item->id}}, this)">
                                <label class="custom-control-label" for="site-off"></label>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection