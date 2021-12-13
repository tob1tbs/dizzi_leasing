function BlogAddSubmit() {
	var form = $('#blog_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxBlogSubmit",
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
                    window.location.replace("/cms/blog/");
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