jQuery(document).ready(function($){

	var buzzstorepro_upload;
	var buzzstorepro_selector;
    function buzzstorepro_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		buzzstorepro_selector = selector;
		event.preventDefault();
		if ( buzzstorepro_upload ) {
			buzzstorepro_upload.open();
		} else {
			buzzstorepro_upload = wp.media.frames.buzzstorepro_upload =  wp.media({
				title: $el.data('choose'),
				button: {
					text: $el.data('update'),
					close: false
				}
			});
			buzzstorepro_upload.on( 'select', function() {
				var attachment = buzzstorepro_upload.state().get('selection').first();
				buzzstorepro_upload.close();
                buzzstorepro_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					buzzstorepro_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				buzzstorepro_selector.find('.upload-button-wdgt').unbind().addClass('remove-file').removeClass('upload-button-wdgt').val(buzzstorepro_widget_img.remove);
				buzzstorepro_selector.find('.of-background-properties').slideDown();
				buzzstorepro_selector.find('.remove-image, .remove-file').on('click', function() {
					buzzstorepro_remove_file( $(this).parents('.section') );
				});
			});
		}
		buzzstorepro_upload.open();
	}

	function buzzstorepro_remove_file(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button-wdgt').removeClass('remove-file').val(buzzstorepro_widget_img.upload);
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button-wdgt').remove();
		}
		selector.find('.upload-button-wdgt').on('click', function(event) {
			buzzstorepro_add_file(event, $(this).parents('.section'));
		});
	}

	$('body').on('click','.remove-image, .remove-file', function() {
		buzzstorepro_remove_file( $(this).parents('.section') );
    });

    $(document).on('click', '.upload-button-wdgt', function( event ) {
    	buzzstorepro_add_file(event, $(this).parents('.section'));
    });


    /**
     * FontAwesome Icon Control JS
    */
    $('body').on('click', '.buzzstorepro-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.buzzstorepro-icon-list').prev('.buzzstorepro-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.buzzstorepro-icon-list').next('input').val(icon_class).trigger('change');
    });

    $('body').on('click', '.buzzstorepro-selected-icon', function(){
        $(this).next().slideToggle();
    });



    /**
     * Repeater Fields
    */
	function buzzstorepro_refresh_repeater_values(){
		$(".buzzstorepro-repeater-field-control-wrap").each(function(){			
			var values = []; 
			var $this = $(this);			
			$this.find(".buzzstorepro-repeater-field-control").each(function(){
			var valueToPush = {};
			$(this).find('[data-name]').each(function(){
				var dataName = $(this).attr('data-name');
				var dataValue = $(this).val();
				valueToPush[dataName] = dataValue;
			});
			values.push(valueToPush);
			});
			$this.next('.buzzstorepro-repeater-collector').val(JSON.stringify(values)).trigger('change');
		});
	}

    $('#customize-theme-controls').on('click','.buzzstorepro-repeater-field-title',function(){
        $(this).next().slideToggle();
        $(this).closest('.buzzstorepro-repeater-field-control').toggleClass('expanded');
    });
    $('#customize-theme-controls').on('click', '.buzzstorepro-repeater-field-close', function(){
    	$(this).closest('.buzzstorepro-repeater-fields').slideUp();;
    	$(this).closest('.buzzstorepro-repeater-field-control').toggleClass('expanded');
    });
    
    $("body").on("click",'.buzzstorepro-add-control-field', function(){
		var $this = $(this).parent();
		if(typeof $this != 'undefined') {
            var field = $this.find(".buzzstorepro-repeater-field-control:first").clone();
            if(typeof field != 'undefined'){                
                field.find("input[type='text'][data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);
                });
                field.find("textarea[data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);
                });
                field.find("select[data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);
                });

                field.find(".attachment-media-view").each(function(){
                    var defaultValue = $(this).find('input[data-name]').attr('data-default');
                    $(this).find('input[data-name]').val(defaultValue);
                    if(defaultValue){
                        $(this).find(".thumbnail-image").html('<img src="'+defaultValue+'"/>').prev('.placeholder').addClass('hidden');
                    }else{
                        $(this).find(".thumbnail-image").html('').prev('.placeholder').removeClass('hidden');   
                    }
                });

				field.find('.buzzstorepro-fields').show();

				$this.find('.buzzstorepro-repeater-field-control-wrap').append(field);

                field.addClass('expanded').find('.buzzstorepro-repeater-fields').show(); 
                $('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
                buzzstorepro_refresh_repeater_values();
            }

		}
		return false;
	 });
	
	$("#customize-theme-controls").on("click", ".buzzstorepro-repeater-field-remove",function(){
		if( typeof	$(this).parent() != 'undefined'){
			$(this).closest('.buzzstorepro-repeater-field-control').slideUp('normal', function(){
				$(this).remove();
				buzzstorepro_refresh_repeater_values();
			});			
		}
		return false;
	});

	$("#customize-theme-controls").on('keyup change', '[data-name]',function(){
		 buzzstorepro_refresh_repeater_values();
		 return false;
	});


	// Set all variables to be used in scope
	var frame;
	// ADD IMAGE LINK
	$('.customize-control-repeater').on( 'click', '.buzzstorepro-upload-button', function( event ){
		event.preventDefault();
		var imgContainer = $(this).closest('.buzzstorepro-fields-wrap').find( '.thumbnail-image'),
		placeholder = $(this).closest('.buzzstorepro-fields-wrap').find( '.placeholder'),
		imgIdInput = $(this).siblings('.upload-id');

		// Create a new media frame
		frame = wp.media({
		    title: 'Select or Upload Image',
		    button: {
		    text: 'Use Image'
		    },
		    multiple: false  // Set to true to allow multiple files to be selected
		});

		// When an image is selected in the media frame...
		frame.on( 'select', function() {
			// Get media attachment details from the frame state
			var attachment = frame.state().get('selection').first().toJSON();
			// Send the attachment URL to our custom image input field.
			imgContainer.html( '<img src="'+attachment.url+'" style="max-width:100%;"/>' );
			placeholder.addClass('hidden');
			// Send the attachment id to our hidden input
			imgIdInput.val( attachment.url ).trigger('change');
		});

		// Finally, open the modal on click
		frame.open();
	});


	// DELETE IMAGE LINK
	$('.customize-control-repeater').on( 'click', '.buzzstorepro-delete-button', function( event ){

	event.preventDefault();
	var imgContainer = $(this).closest('.buzzstorepro-fields-wrap').find( '.thumbnail-image'),
	placeholder = $(this).closest('.buzzstorepro-fields-wrap').find( '.placeholder'),
	imgIdInput = $(this).siblings('.upload-id');

	// Clear out the preview image
	imgContainer.find('img').remove();
	placeholder.removeClass('hidden');

	// Delete the image id from the hidden input
	imgIdInput.val( '' ).trigger('change');

	});


	/*Drag and drop to change order*/
	$(".buzzstorepro-repeater-field-control-wrap").sortable({
		orientation: "vertical",
		update: function( event, ui ) {
			buzzstorepro_refresh_repeater_values();
		}
	});


    /** 
      * Preloader Selection 
    */  
    $(".buzzstorepro-preloader").click(function (e) {
        e.preventDefault();
        var preloader = $(this).attr("preloader");	    
        $(this).parents(".buzzstorepro-preloader-container").find('.buzzstorepro-preloader').removeClass('active');
        $(this).addClass('active');
        $(this).parents(".buzzstorepro-preloader-container").next('input:hidden').val(preloader).change();
    });


    /** 
     * Import Demo Data Ajax Function Area 
    */ 
    $("#demo_import").click(function (){
        $import_true = confirm('Are you sure to import dummy content ? It will overwrite the existing data.');
        if($import_true == false) return;
        var imp = $(this).next('div');
        imp.addClass('demo-loading');

        $(".import-message").html("The Demo Contents are Loading. It might take a while. Please keep patience.");
        $("#demo_import").fadeOut();
        $.ajax({
           url: ajaxurl,
           data: ({
            'action': 'buzzstorepro_demo_import',            
           }),
           success: function(response){
                imp.removeClass('demo-loading');
                alert("Demo Contents Successfully Imported");
                location.reload();
           }
        });
    });

});

(function ($) {
    jQuery(document).ready(function ($) {
        $('.sparkle-customizer').on( 'click', function( evt ){
            evt.preventDefault();
            section = $(this).data('section');
            if ( section ) {
                wp.customize.section( section ).focus();
            }
        });
    });
})(jQuery);