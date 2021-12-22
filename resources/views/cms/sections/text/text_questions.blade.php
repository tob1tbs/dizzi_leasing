@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">ხშირად დასმული კითხვების ჩამონათვალი</h4>
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
                    <th class="nk-tb-col nk-tb-col-tools">სტატუსი</th>
                    <th class="nk-tb-col nk-tb-col-tools text-right">მოქემდება</th>
                </tr>
            </thead>
            <tbody>
            @foreach($faq_list as $faq_item)
            <tr class="nk-tb-item">
                <td class="nk-tb-col">
                    <div class="user-card">
                        <div class="user-info">
                            <span class="tb-lead">{{ json_decode($faq_item->title)->ge }}</span>
                        </div>
                    </div>
                </td>
                <td class="nk-tb-col tb-col-md">
                	<div class="form-group">
            			<div class="custom-control custom-switch">
            				<input type="checkbox" class="custom-control-input" name="reg-public" id="question_{{ $faq_item->id }}" value="1" @if($faq_item->status == 1) checked @endif onclick="QuestionStatusChange({{ $faq_item->id}}, this)">
            				<label class="custom-control-label" for="question_{{ $faq_item->id }}"></label>
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
                                        <li><a href="javascript:;" onclick="EditQuestion({{ $faq_item->id }})"><em class="icon ni ni-edit"></em><span>რედაქტირება</span></a></li>
                                        <li><a href="javascript:;" class="text-danger" onclick="QuestionDelete({{ $faq_item->id }})"><span>წაშლა</span></a></li>
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
<div class="modal fade" id="QuestionModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue question-heading">კითხვის დამატება</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="question_form">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">კითხვის დასახელება</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control user-input" name="question_title_ge" id="question_title_ge">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-question_title_ge"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">კითხვის აღწერა</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control user-input" name="question_text_ge" id="question_text_ge">
                                    <span class="text-danger font-helvetica-regular font-italic error-text error-question_text_ge"></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="question_id" id="question_id">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <button type="button" onclick="QuestionSubmit()" class="btn btn-lg btn-primary font-helvetica-regular">შენახვა</button>
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
	function AddQuestion() {
        $('#question_form')[0].reset();
        $("#QuestionModal").modal('show');
	}	

	function QuestionStatusChange(question_id, elem) {
		if($(elem).is(":checked")) {
            question_status = 1;
        } else {
            question_status = 0
        }

        $.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxQuestionStatusChange",
            type: "POST",
            data: {
                question_id: question_id,
                question_status: question_status,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                return;
            }
        });
	}

    function EditQuestion(question_id) {
        $.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxEditQuestion",
            type: "GET",
            data: {
                question_id: question_id,
            },
            success: function(data) {
                $("#question_id").val(data['FaqData']['id']);
                $("#question_title_ge").val(JSON.parse(data['FaqData']['title'])['ge']);
                $("#question_text_ge").val(JSON.parse(data['FaqData']['value'])['ge']);
                $(".question-heading").html('კითხვის რედაქტირება');
                $("#QuestionModal").modal('show');
            }
        });
    }

    function QuestionDelete(question_id) {
        Swal.fire({
        title: "ნამდვილად გსურთ კითხვის წაშლა?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'წაშლა',
        cancelButtonText: "გათიშვა",
        preConfirm: () => {
            $.ajax({
                dataType: 'json',
                url: "/cms/ajax/ajaxQuestionDelete",
                type: "POST",
                data: {
                    user_id: user_id,
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

    function QuestionSubmit() {
        var form = $('#question_form')[0];
        var data = new FormData(form);

        $.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxQuestionSubmit",
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
                        window.location.reload();
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