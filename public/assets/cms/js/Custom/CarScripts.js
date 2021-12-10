function CarOptionAddModal() {
	$(".car-parameter-title").html('ახალი პარამეტრის დამატება');
	$("#CarOptionAddModal").modal('show');
}

function OptionSubmit() {
	var form = $('#option_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxOptionSubmit",
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

function OptionValueGet(option_id) {
	$.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxOptionValueGet",
        type: "GET",
        data: {
            option_id: option_id,
        },
        success: function(data) {
            if(data['status'] == true) {
            	$("#value_option_id").val('').val(option_id);
                $("#value_option_key").val('').val(data['CarOptionData']['key']);
                $(".option-value-list").html('');
                $.each(data['CarOptionValueList'], function(key, value) {
                	title_data = JSON.parse(value['value']);
	                $(".option-value-list").append(`
	                	<tr class="value-item-`+value['id']+`">
	                		<td>`+value['id']+`</td>
	                		<td>`+title_data['ge']+`</td>
	                		<td>`+title_data['en']+`</td>
	                		<td>
	                            <div class="dropdown">
	                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false">
	                                    <em class="icon ni ni-more-h"></em>
	                                </a>
	                                <div class="dropdown-menu dropdown-menu-right dropdown-menu" style="">
	                                    <ul class="link-list-plain">
	                                        <li><a href="javascript:;" onclick="OptionValueDelete(`+value['id']+`)">წაშლა</a></li>
	                                    </ul>
	                                </div>
	                            </div>
	                        </td>
	                	</tr>
	            	`);
            	});
                $("#CarOptionValueModal").modal('show');
            }
        }
    });
}

function OptionValueDelete(value_id) {
	 Swal.fire({
        title: 'ნამდვილად გსურთ ქვეპარამეტრის წაშლა?',
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
            url: "/cms/ajax/ajaxOptionValueDelete",
            type: "POST",
            data: {
                value_id: value_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data['status'] == true) {
                	$(".option-value-list").html('');
                	$.each(data['CarOptionValueList'], function(key, value) {
	                	title_data = JSON.parse(value['value']);
		                $(".option-value-list").append(`
		                	<tr class="value-item-`+value['id']+`">
		                		<td>`+value['id']+`</td>
		                		<td>`+title_data['ge']+`</td>
		                		<td>`+title_data['en']+`</td>
		                		<td>
		                            <div class="dropdown">
		                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false">
		                                    <em class="icon ni ni-more-h"></em>
		                                </a>
		                                <div class="dropdown-menu dropdown-menu-right dropdown-menu" style="">
		                                    <ul class="link-list-plain">
		                                        <li><a href="javascript:;" onclick="OptionValueDelete(`+value['id']+`)">წაშლა</a></li>
		                                    </ul>
		                                </div>
		                            </div>
		                        </td>
		                	</tr>
		            	`);
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

function OptionValueSubmit() {
	var form = $('#option_value_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxOptionValueSubmit",
        type: "POST",
        data: data,
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
	                });
                } else {
                	$(".option-value-list").html('');
	                $.each(data['CarOptionValueList'], function(key, value) {
	                	title_data = JSON.parse(value['value']);
		                $(".option-value-list").append(`
		                	<tr class="value-item-`+value['id']+`">
		                		<td>`+value['id']+`</td>
		                		<td>`+title_data['ge']+`</td>
		                		<td>`+title_data['en']+`</td>
		                		<td>
		                            <div class="dropdown">
		                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false">
		                                    <em class="icon ni ni-more-h"></em>
		                                </a>
		                                <div class="dropdown-menu dropdown-menu-right dropdown-menu" style="">
		                                    <ul class="link-list-plain">
		                                        <li><a href="javascript:;" onclick="OptionValueDelete(`+value['id']+`)">წაშლა</a></li>
		                                    </ul>
		                                </div>
		                            </div>
		                        </td>
		                	</tr>
		            	`);
	            	});
	            	$('#option_value_form').trigger("reset");
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

function CarOptionDelete(option_id) {
	Swal.fire({
        title: 'ნამდვილად გსურთ პარამეტრის წაშლა?',
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
            url: "/cms/ajax/ajaxCarOptionDelete",
            type: "POST",
            data: {
                option_id: option_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data['status'] == true) {
                	$("#option_item-"+option_id).remove();
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

function GetCarModelList() {
    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxCarMake",
        type: "GET",
        data: {
            make_id: $("#make").val(),
        },
        success: function(data) {
            if(data['status'] == true) {
                if(data['CarModelList'].length > 0) {
                    $("#model").html('');
                    $.each(data['CarModelList'], function(key, value) {
                        $("#model").append(`<option value='`+value['id']+`'>`+value['name']+`</option>`)
                    });
                    $("#model").attr('disabled', false);
                } else {
                    $("#model").attr('disabled', true);
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

function CarsAddSubmit() {
    var form = $('#cars_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxCarsAddSubmit",
        type: "POST",
        data: data,
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
                window.location.href = "/cms/cars/";
            } else {
                Swal.fire({
                  icon: 'error',
                  text: data['message'],
                })
            }
        }
    });
}

function CarStatusChange(car_id, elem) {
    if($(elem).is(":checked")) {
        car_status = 1;
    } else {
        car_status = 0
    }

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxCarStatusChange",
        type: "POST",
        data: {
            car_id: car_id,
            car_status: car_status,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            return;
        }
    });
}

function CarDelete(car_id) {
    Swal.fire({
        title: "ნამდვილად გსურთ მანქანის წაშლა?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'წაშლა',
        cancelButtonText: "გათიშვა",
        preConfirm: () => {
            $.ajax({
                dataType: 'json',
                url: "/cms/ajax/ajaxCarDelete",
                type: "POST",
                data: {
                    car_id: car_id,
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

function DeleteGalleryPhoto(photo_id) {
    Swal.fire({
        title: "ნამდვილად გსურთ სურათის წაშლა?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'წაშლა',
        cancelButtonText: "გათიშვა",
        preConfirm: () => {
            $.ajax({
                dataType: 'json',
                url: "/cms/ajax/ajaxDeleteGalleryPhoto",
                type: "POST",
                data: {
                    photo_id: photo_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data['status'] == true) {
                        $(".gallery_item-"+photo_id).remove();
                    } else {
                        Swal.fire({
                          icon: 'error',
                          text: data['message'],
                        })
                    }
                }
            });
        }
    });
}