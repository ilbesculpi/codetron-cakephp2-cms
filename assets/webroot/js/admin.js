
var admin = {
	
	initialize: function() {
		
		// confirm
		$('[data-confirm]').click(function(e) {
			return confirm( $(this).attr('data-confirm') );
		});
		
		// datetime picker
		$('.datetime').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
			showClear: true
		});
		
		// form validation
		$('form').each(function(element) {
			var dataValidation = $(this).attr('data-validation');
			if( dataValidation ) {
				$(this).bootstrapValidator( forms[dataValidation] );
			}
		});
	}
	
};

var forms = {
	"form-races": {
		fields: {
			"data[Race][race_type_id]": {
				validators: { 
					notEmpty: {}
				}
			},
			"data[Race][name]": {
				validators: {
					notEmpty: {}
				}
			},
			"data[Race][description]": {
				validators: {
					notEmpty: {},
					stringLength: {
						max: 255
					}
				}
			},
			"data[Race][location]": {
				validators: {
					notEmpty: {},
					stringLength: {
						max: 255
					}
				}
			},
			"data[Race][race_date]": {
				validators: {
					notEmpty: {}
				}
			}
		}
	}
};