(function($){
	"use strict";

	/*----------------------------
		Type password toggle.
	-----------------------------*/
	$(document).on('click','.error-passw', function(){

		var passw 	= $('.input-pass');
		var toggle  = $('.error-passw > i');

		if (passw.attr('type') === "password") {
			passw.attr('type', 'text');
			toggle.removeClass('fa-eye-slash');
			toggle.addClass('fa-eye');

		} else {
			passw.attr('type', 'password');
			toggle.removeClass('fa-eye');
			toggle.addClass('fa-eye-slash');
		}
	})


	


})(jQuery);
