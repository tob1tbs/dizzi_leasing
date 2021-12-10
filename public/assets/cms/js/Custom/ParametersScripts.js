function TranslateAddModal() {
	$("#TranslateAddModal").modal('show');
}

function TranslateSubmit() {
	var form = $('#translate_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxTranslateSubmit",
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
                    $(".translate-input").removeClass('border-danger');
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
                    location.reload();
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

function DeleteTranslate(translate_id) {
    Swal.fire({
        title: 'ნამდვილად გსურთ თარგმნის წაშლა?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'წაშლა',
        cancelButtonText: 'გათიშვა',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxDeleteTranslate",
            type: "POST",
            data: {
                translate_id: translate_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data['status'] == true) {
                    $(".translate-item-"+translate_id).remove();
                    Swal.fire({
                        icon: 'success',
                        text: data['message'],
                        timer: 1500,
                    });    
                } else {
                    Swal.fire({
                      icon: 'error',
                      text: data['message'],
                    })
                }
            }
        });
      }
    })
}

function TranslateUpdateSubmit(translate_id) {
    var form = $('#translate_form_'+translate_id)[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxTranslateUpdateSubmit",
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
                });    
            } else {
                Swal.fire({
                  icon: 'error',
                  text: data['message'],
                })
            }
        }
    });
}

function BasicParameterSubmit() {
    var form = $('#basic_parameter_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxBasicParameterSubmit",
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
                });    
            } else {
                Swal.fire({
                  icon: 'error',
                  text: data['message'],
                })
            }
        }
    });
}