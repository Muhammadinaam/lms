function form_ajax_submit( obj = { form_selector: '' } )
{

	var form = $(obj.form_selector);

	form.submit(function(e){

		e.preventDefault();

		var formData = new FormData(form[0]);

		$.ajax({
	        type: form.attr('method'),
	        url: form.attr('action'),
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        success: function(data){

	          if(data.success == true)
	          {

	            swal({
	                    title: 'Success', 
	                    text: data.message, 
	                    type: "success",
	                  }, function(){
                        
                        form.trigger("reset");

                        var modal = form.parents('.modal').eq(0);
                        modal.modal('hide');        

                      });


	            
                
	            

	          }
	          else if(data.success == false)
	            swal("Error", data.message, "error");

	        },
	        error: function(jqXHR, exception){

	          ajax_errors_sweetalert_func(jqXHR, exception);

	        }
	      });

	});

}

function ajax_errors_sweetalert_func(jqXHR, exception)
  {
    var msg = '';

    var isHtml = false;

    if (exception == 'Unauthorized') {
        
        window.location = "url('admin')";
    }

    if (jqXHR.status === 0) {
        msg = 'Not connected. Verify Network.';
    } else if (jqXHR.status == 404) {
        if( jqXHR.responseText.trim() != '' && jqXHR.responseText.trim() != '""' )
        {
            msg = jqXHR.responseText;
        }
        else
        {
            msg = 'Requested page not found. [404]';
        }

        

    }
    else if (jqXHR.status == 403) {
        msg = 'Not Allowed. [403]';
    }
    else if (jqXHR.status == 401) {
        msg = 'Session Expired. [401]';
    }else if (jqXHR.status == 422) {
        
        //process validation errors here.
        errors = jqXHR.responseJSON; //this will get the errors response data.
        //show them somewhere in the markup
        //e.g
        errorsHtml = '<div class="alert alert-danger"><ul>';

        $.each( errors, function( key, value ) {
            errorsHtml += '<li style="text-align: left;">' + value[0] + '</li>'; //showing only the first error.
        });
        errorsHtml += '</ul></div>';
            
        msg = errorsHtml;

        isHtml = true;

    } else if (jqXHR.status == 500) {
        msg = 'Internal Server Error [500].';
    } else if (exception === 'parsererror') {
        msg = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
        msg = 'Time out error.';
    } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
    } else {
        msg = 'Uncaught Error.' + jqXHR.responseText;
    }
    
    if(msg != '')
    {
      swal({
        title: 'Error',
        text: msg,
        html: isHtml,
        type: 'error',
        confirmButtonColor: "#2495d6",

      });
    }
  }