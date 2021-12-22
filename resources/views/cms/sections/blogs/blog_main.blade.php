@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">ბლოგების ჩამონათვალი</h4>
        </div>    
        <div class="nk-block-head-content">
            <ul class="nk-block-tools g-3">
                <li>
                    <a href="{{ route('actionBlogAdd') }}" class="btn btn-white btn-outline-light">
                        <em class="icon ni ni-plus"></em>
                        <span class="font-helvetica-regular">ახალი ბლოგი</span>
                    </a>
                </li>
            </ul>
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
                    <span>დასახელება</span>
                </div>
                <div class="nk-tb-col tb-col-sm">
                    <span>სტატუსი</span>
                </div>
                <div class="nk-tb-col">
                    <span>&nbsp;</span>
                </div>
            </div>
            @foreach($blog_list as $blog_item)
            <div class="nk-tb-item">
                <div class="nk-tb-col">
                    <span>{{ $blog_item->id }}</span>
                </div>
                <div class="nk-tb-col">
                    <div class="align-center">
                        <span class="tb-sub ml-2">{{ json_decode($blog_item->title)->ge }}</span>
                    </div>
                </div>
                <div class="nk-tb-col tb-col-sm">
                    <div class="form-group">
                        <div class="custom-control custom-switch checked">
                            
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
                                <li><a href="{{ route('actionBlogEdit', $blog_item->id) }}">რედაქტირება</a></li>
                                <li><a href="javascript:;" class="text-danger" onclick="BlogDelete({{ $blog_item->id }})"><span>წაშლა</span></a></li>
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
    function BlogDelete(blog_id) {
        Swal.fire({
            title: "ნამდვილად გსურთ კითხვის წაშლა?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'წაშლა',
            cancelButtonText: "გათიშვა",
            preConfirm: () => {
                $.ajax({
                    dataType: 'json',
                    url: "/cms/ajax/ajaxBlogDelete",
                    type: "POST",
                    data: {
                        blog_id: blog_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        Swal.fire({
                          icon: 'success',
                          text: data['message'],
                        })
                        location.reload();
                    }
                });
            }
        });
    }
</script>
@endsection