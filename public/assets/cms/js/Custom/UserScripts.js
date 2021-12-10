function UserVerify(method, user_id) {

	$("#verify_method, #verify_user_id, #verify_code").val('');

	$.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxUserVerify",
        type: "POST",
        data: {
            method: method,
            user_id: user_id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
            	$("#verify_method").val(method);
            	$("#verify_user_id").val(user_id);
                $("#VerifyModal").modal('show');
            }
        }
    });
}

function VerifyFormSubmit() {
	$.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxUserVerifySubmit",
        type: "POST",
        data: {
            method: $("#verify_method").val(),
        	user_id: $("#verify_user_id").val(),
        	code: $("#verify_code").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
            	$("#VerifyModal").modal('hide');
        		Swal.fire({
				  icon: 'success',
				  text: data['message'],
                  timer: 1500,
				})
				location.reload();
            } else {
            	Swal.fire({
				  icon: 'error',
				  text: data['message'],
				})
            }
        }
    });
}

function UserDelete(user_id) {
    Swal.fire({
        title: "ნამდვილად გსურთ მომხმარებლის წაშლა?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'წაშლა',
        cancelButtonText: "გათიშვა",
        preConfirm: () => {
            $.ajax({
                dataType: 'json',
                url: "/cms/ajax/ajaxUserDelete",
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

function UserStatusChange(user_id, elem) {
	if($(elem).is(":checked")) {
        user_status = 1;
    } else {
        user_status = 0
    }

	$.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxUserStatusChange",
        type: "POST",
        data: {
        	user_id: user_id,
        	user_status: user_status,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            return;
        }
    });
}

function UserModal() {
    $(".user-modal-custom-title").html('ახალი მომხმარებლის რეგისტრაცია');
    $('#user_form').trigger("reset");
    $("#UserModal").modal('show');
}

function UserSubmit() {
    var form = $('#user_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxUserSubmit",
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
                    $(".user-input").removeClass('border-danger');
                    $(".error-text").html('');
                    $.each(data['message'], function(key, value) {
                        $('#'+key).addClass('border-danger');
                        $('.error-'+key).html('').html(value);
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        text: data['message'],
                        timer: 1500,
                    });
                    location.reload()
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

function UserEdit(user_id) {
    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxUserEdit",
        type: "GET",
        data: {
            user_id: user_id,
        },
        success: function(data) {
            if(data['status'] == true) {
                $('#user_form').trigger("reset");
                $.each(data['UserData'], function(key, value){
                    $("#user_"+key).val(value);
                    $(".user-modal-custom-title").html('მომხმარებელის რედაქტირება');
                    $("#UserModal").modal('show');
                });
            }
        }
    });
}

function UserRoleModal() {
    $(".role-modal-custom-title").html('ახალი წვდომის ჯგუფის დამატება');
    $('#role_form').trigger("reset");
    $("#RoleModal").modal('show');
}

function RoleSubmit() {
    var form = $('#role_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxRoleSubmit",
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
                    $(".role-input").removeClass('border-danger');
                    $(".error-text").html('');
                    $.each(data['message'], function(key, value) {
                        $('#'+key).addClass('border-danger');
                        $('.error-'+key).html('').html(value);
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        text: data['message'],
                        timer: 1500,
                    });
                    location.reload()
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

function RoleStatusChange(role_id, elem) {
    if($(elem).is(":checked")) {
        role_status = 1;
    } else {
        role_status = 0
    }

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxRoleStatusChange",
        type: "POST",
        data: {
            role_id: role_id,
            role_status: role_status,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            return;
        }
    });
}

function RoleEdit(role_id) {
    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxRoleEdit",
        type: "GET",
        data: {
            role_id: role_id,
        },
        success: function(data) {
            if(data['status'] == true) {
                $('#role_form').trigger("reset");
                $.each(data['UserRoleData'], function(key, value){
                    $("#role_"+key).val(value);
                    $(".role-modal-custom-title").html('წვდომის ჯგუფის რედაქტირება');
                    $("#RoleModal").modal('show');
                });
            }
        }
    });
}

function RoleDelete(role_id) {
    Swal.fire({
        title: "ნამდვილად გსურთ ჯგუფის წაშლა?",
        text: "მომხმარებლები რომელებთაც ააქვთ მინიჭებული აღნიშნული ჯგუფი, ავტომატურად გადავლენ ჯგუფ მოხმარებლებში !!!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'წაშლა',
        cancelButtonText: "გათიშვა",
        preConfirm: () => {
            $.ajax({
                dataType: 'json',
                url: "/cms/ajax/ajaxRoleDelete",
                type: "POST",
                data: {
                    role_id: role_id,
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

function RolePermissions(role_id) {
    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxRolePermissions",
        type: "GET",
        data: {
            role_id: role_id,
        },
        success: function(data) {
            if(data['status'] == true) {
                $(".permission-list").html('');
                view = ``;
                $.each(data['PermissionGroupArray']['group_data'], function(key, value){
                    view += `
                    <div class="col-lg-4 col-sm-12 mb-3">
                        <div class="font-neue">`+value['group_name']+`</div>
                        <div class="row">
                        `;
                        $.each(value['permissions']['list'], function(permission_key, permission_value){
                            view += `
                            <div class="col-lg-12">
                                <div class="custom-control custom-control-sm custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission_`+permission_value['id']+`" value="`+permission_value['id']+`">
                                    <label class="custom-control-label font-neue" for="permission_`+permission_value['id']+`">`+permission_value['title']+`</label>
                                </div>
                            </div>
                            `;
                        });
                    view += `</div></div>`;
                });
                $(".permission-list").append(view);
                $.each(data['PermissionGroupArray']['group_data'], function(key, value){
                    $.each(value['permissions']['list'], function(permission_key, permission_value){
                        $.each(value['permissions']['selected'], function(selected_key, selected_value){
                            if(permission_value['id'] == selected_value['permission_id']) {
                                $("#permission_"+selected_value['permission_id']).prop('checked', true);
                            }
                        });
                    });
                });
                $("#permission_role_id").val(role_id);
                $(".role-modal-custom-title").html('წვდომის ჯგუფის რედაქტირებ');
                $("#PermissionModal").modal('show');
            }
        }
    });
}

function PermissionSubmit() {
    var form = $('#permission_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxPermissionSubmit",
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
                Swal.fire({
                    icon: 'success',
                    text: data['message'],
                    timer: 1500,
                    timerProgressBar: true,
                })
                $("#PermissionModal").modal('hide');
            } else {
                Swal.fire({
                  icon: 'error',
                  text: data['message'],
                })
            }
        }
    });
}

function UserRoleChange(user_id) {
    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxGetUserRole",
        type: "GET",
        data: {
            user_id: user_id,
        },
        success: function(data) {
            if(data['status'] == true) {
                $(".permission-list").html('');
                view = ``;
                $.each(data['PermissionGroupArray']['group_data'], function(key, value){
                    view += `
                    <div class="col-lg-4 col-sm-12 mb-3">
                        <div class="font-neue">`+value['group_name']+`</div>
                        <div class="row">
                        `;
                        $.each(value['permissions']['list'], function(permission_key, permission_value){
                            view += `
                            <div class="col-lg-12">
                                <div class="custom-control custom-control-sm custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission_`+permission_value['id']+`" value="`+permission_value['id']+`">
                                    <label class="custom-control-label font-neue" for="permission_`+permission_value['id']+`">`+permission_value['title']+`</label>
                                </div>
                            </div>
                            `;
                        });
                    view += `</div></div>`;
                });
                $(".permission-list").append(view);
                $.each(data['PermissionGroupArray']['group_data'], function(key, value){
                    $.each(value['permissions']['list'], function(permission_key, permission_value){
                        $.each(value['permissions']['selected'], function(selected_key, selected_value){
                            if(permission_value['id'] == selected_value['permission_id']) {
                                $("#permission_"+selected_value['permission_id']).prop('checked', true);
                            }
                        });
                    });
                });
                $("#permission_role_id").val(role_id);
                $(".role-modal-custom-title").html('წვდომის ჯგუფის რედაქტირებ');
                $("#PermissionModal").modal('show');
            }
        }
    });
    $("#user_role_change_id").val(user_id);
    $("#UserRoleChangeModal").modal('show');
}

function UserRoleChangeSubmit() {
    var form = $('#user_role_change_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxUserRoleChangeSubmit",
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
                Swal.fire({
                    icon: 'success',
                    text: data['message'],
                    timer: 1500,
                    timerProgressBar: true,
                })
                $("#UserRoleChangeModal").modal('hide');
                location.reload();
            } else {
                Swal.fire({
                  icon: 'error',
                  text: data['message'],
                })
            }
        }
    });
}

function UserSendToCrm(user_id) {
    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxUserSendToCrm",
        type: "POST",
        data: {
            user_id: user_id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                Swal.fire({
                    icon: 'success',
                    text: data['message'],
                    timer: 1500,
                    timerProgressBar: true,
                })
                location.reload();
            }
        }
    });
}