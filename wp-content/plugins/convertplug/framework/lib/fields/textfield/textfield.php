<?php
/**
 * Prohibit direct script loading.
 *
 * @package Convert_Plus.
 */

// Add new input type "textfield".
if ( function_exists( 'smile_add_input_type' ) ) {
	smile_add_input_type( 'textfield', 'textfield_settings_field' );
}

/**
 * Function Name:txt_link_settings_field Function to handle new input type "textfield".
 *
 * @param  string $name     settings provided when using the input type "txt_link".
 * @param  string $settings holds the default / updated value.
 * @param  string $value    html output generated by the function.
 * @return string           html output generated by the function.
 */
function textfield_settings_field( $name, $settings, $value ) {
	$input_name = $name;
	$value      = htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' );
	$type       = isset( $settings['type'] ) ? $settings['type'] : '';
	$class      = isset( $settings['class'] ) ? $settings['class'] : '';
	$output     = '<p><input type="text" id="smile_' . $input_name . '" class="form-control smile-input smile-' . $type . ' ' . $input_name . ' ' . $type . ' ' . $class . '" name="' . $input_name . '" value="' . $value . '" /></p>';
	return $output;
}
