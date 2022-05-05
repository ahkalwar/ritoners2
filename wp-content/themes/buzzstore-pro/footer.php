<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buzzstore Pro
 */
?>
	<?php

		do_action( 'buzzstorepro_footer_before');

			/**
			 * @see  buzzstorepro_footer_widget_area() - 10
			*/
			do_action( 'buzzstorepro_footer_widget');

	    	/**
	    	 * Button Footer Area
	    	 * Two different filters
	    	   * @see  buzzstorepro_credit() - 5
	    	   * @see  buzzstorepro_payment_logo() - 10
	    	*/
	    	do_action( 'buzzstorepro_button_footer'); 
	    
	    do_action( 'buzzstorepro_footer_after');
	

	?>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
