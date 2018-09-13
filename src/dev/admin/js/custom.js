(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $("#advanceGreenSliderForm").validate({
		submitHandler:function(){
			 
			var postData = $("#advanceGreenSliderForm").serialize()+"&action=advance_slider_request&param=save_advance_green_slider_options";
			$.post(advance_green_ajax_url, postData, function(response){
				var result = $.parseJSON(response);

				if(result.type==="success"){
					swal("It's Done!",result.message, "success");
					$( '#advanceGreenSliderForm' )[0].reset();
					$("#media-image").attr("src"," ");
					$("#media-image").removeAttr("src");
				}
				else{
					swal("Sorry!",result.message, "warning");
				}

			});
		}
	 });
		$("#btnUploadImage").on("click",function () {  
			var image = wp.media({
				title:"Upload Image for Slider",
				multiple:false
			}).open().on("select",function(){
				var files = image.state().get("selection");
				var jsonFiles = files.toJSON();
				// console.log(jsonFiles);
				$.each(jsonFiles,function(index,item){
					$("#hompageimagesliderUrl").val(item.url);
					$("#media-image").attr("src",item.url);
				})
			})

		});

})( jQuery );
