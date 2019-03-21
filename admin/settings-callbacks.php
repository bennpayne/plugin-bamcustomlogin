<?php // BAM Custom Login - Settings Callbacks



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}



// callback: login section
function bamcustomlogin_callback_section_login() {
	
	echo '<p>'. esc_html__('These settings enable you to customize the WP Login screen.', 'bamcustomlogin') .'</p>';
	
}



// callback: admin section
function bamcustomlogin_callback_section_admin() {
	
	echo '<p>'. esc_html__('These settings enable you to customize the WP Admin Area.', 'bamcustomlogin') .'</p>';
	
}



// callback: text field
function bamcustomlogin_callback_field_text( $args ) {
	
	$options = get_option( 'bamcustomlogin_options', bamcustomlogin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="bamcustomlogin_options_'. $id .'" name="bamcustomlogin_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="bamcustomlogin_options_'. $id .'">'. $label .'</label>';
	
}



// radio field options
function bamcustomlogin_options_radio() {
	
	return array(
		
		'enable'  => esc_html__('Enable custom styles', 'bamcustomlogin'),
		'disable' => esc_html__('Disable custom styles', 'bamcustomlogin')
		
	);
	
}



// callback: radio field
function bamcustomlogin_callback_field_radio( $args ) {
	
	$options = get_option( 'bamcustomlogin_options', bamcustomlogin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = bamcustomlogin_options_radio();
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="bamcustomlogin_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}
	
}



// callback: textarea field
function bamcustomlogin_callback_field_textarea( $args ) {
	
	$options = get_option( 'bamcustomlogin_options', bamcustomlogin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$allowed_tags = wp_kses_allowed_html( 'post' );
	
	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
	
	echo '<textarea id="bamcustomlogin_options_'. $id .'" name="bamcustomlogin_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="bamcustomlogin_options_'. $id .'">'. $label .'</label>';
	
}



// callback: checkbox field
function bamcustomlogin_callback_field_checkbox( $args ) {
	
	$options = get_option( 'bamcustomlogin_options', bamcustomlogin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
	echo '<input id="bamcustomlogin_options_'. $id .'" name="bamcustomlogin_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="bamcustomlogin_options_'. $id .'">'. $label .'</label>';
	
}



// select field options
function bamcustomlogin_options_select() {
	
	return array(
		
		'default'   => esc_html__('Default',   'bamcustomlogin'),
		'light'     => esc_html__('Light',     'bamcustomlogin'),
		'blue'      => esc_html__('Blue',      'bamcustomlogin'),
		'coffee'    => esc_html__('Coffee',    'bamcustomlogin'),
		'ectoplasm' => esc_html__('Ectoplasm', 'bamcustomlogin'),
		'midnight'  => esc_html__('Midnight',  'bamcustomlogin'),
		'ocean'     => esc_html__('Ocean',     'bamcustomlogin'),
		'sunrise'   => esc_html__('Sunrise',   'bamcustomlogin'),
		
	);
	
}



// callback: select field
function bamcustomlogin_callback_field_select( $args ) {
	
	$options = get_option( 'bamcustomlogin_options', bamcustomlogin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$select_options = bamcustomlogin_options_select();
	
	echo '<select id="bamcustomlogin_options_'. $id .'" name="bamcustomlogin_options['. $id .']">';
	
	foreach ( $select_options as $value => $option ) {
		
		$selected = selected( $selected_option === $value, true, false );
		
		echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
		
	}
	
	echo '</select> <label for="bamcustomlogin_options_'. $id .'">'. $label .'</label>';
	
}


