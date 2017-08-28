function ajaxInModal(unique_name, modal_title, ajax_object, on_hide_callback, modal_class)
{
	modal_class = typeof modal_class !== 'undefined' ? modal_class : 'modal-lg';
	var modal = $('body').find('#'+unique_name);

	if( !modal.length )
	{
		$('body').append(`
						<div id="`+unique_name+`" class="modal fade" role="dialog">
						  <div class="modal-dialog `+modal_class+`">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">`+modal_title+`</h4>
						      </div>
						      <div class="modal-body">
						        <p>Please wait...</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>

						  </div>
						</div>
						`);
	}

	modal = $('body').find('#'+unique_name);

	modal.modal('show');

	ajax_object.done(function(data){
		modal.find('.modal-body').html(data);
	});
	

	ajax_object.fail(function(jqXHR, exception){

        ajax_errors_sweetalert_func(jqXHR, exception);
        modal.modal('hide');

	});


	modal.on('hidden.bs.modal', function () {

		modal.find('.modal-body').empty();

    
	    if(on_hide_callback)
	      on_hide_callback();


	    modal = modal.unbind('hidden.bs.modal');

	});

	
}