function LeasingParametersSubmit() {
	var form = $('#leasing_parameters')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxLeasingParametersSubmit",
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
	                $(".parameter-input").removeClass('border-danger');
	                $(".error-text").html('');
	                $.each(data['message'], function(key, value) {
	                    $('#'+key).addClass('border-danger');
	                    $('.error-'+key).html('').html(value);
	                })
                } else {
                	$(".parameter-input").removeClass('border-danger');
	                $(".error-text").html('');
                    Swal.fire({
                        icon: 'success',
                        text: data['message'],
                        timer: 1500,
                    });
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