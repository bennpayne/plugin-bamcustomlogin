<?php // BAM Custom Login - Register Settings



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}



// register plugin settings
function bamcustomlogin_register_settings() {
	
	/*
	
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback = ''
	);
	
	*/
	
	register_setting( 
		'bamcustomlogin_options', 
		'bamcustomlogin_options', 
		'bamcustomlogin_callback_validate_options' 
	); 
	
	/*
	
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	
	*/
	
	add_settings_section( 
		'bamcustomlogin_section_login', 
		esc_html__('Customize Login Page', 'bamcustomlogin'), 
		'bamcustomlogin_callback_section_login', 
		'bamcustomlogin'
	);
	
	add_settings_section( 
		'bamcustomlogin_section_admin', 
		esc_html__('Customize Admin Area', 'bamcustomlogin'), 
		'bamcustomlogin_callback_section_admin', 
		'bamcustomlogin'
	);
	
	/*
	
	add_settings_field(
    	string   $id, 
		string   $title, 
		callable $callback, 
		string   $page, 
		string   $section = 'default', 
		array    $args = []
	);
	
	*/
	
	add_settings_field(
		'custom_url',
		esc_html__('Custom URL', 'bamcustomlogin'),
		'bamcustomlogin_callback_field_text',
		'bamcustomlogin', 
		'bamcustomlogin_section_login', 
		[ 'id' => 'custom_url', 'label' => esc_html__('Custom URL for the login logo link', 'bamcustomlogin') ]
	);
	
	add_settings_field(
		'custom_title',
		esc_html__('Custom Title', 'bamcustomlogin'),
		'bamcustomlogin_callback_field_text',
		'bamcustomlogin', 
		'bamcustomlogin_section_login', 
		[ 'id' => 'custom_title', 'label' => esc_html__('Custom title attribute for the logo link', 'bamcustomlogin') ]
	);
	
	add_settings_field(
		'custom_style',
		esc_html__('Custom Style', 'bamcustomlogin'),
		'bamcustomlogin_callback_field_radio',
		'bamcustomlogin', 
		'bamcustomlogin_section_login', 
		[ 'id' => 'custom_style', 'label' => esc_html__('Custom CSS for the Login screen', 'bamcustomlogin') ]
	);
	
	add_settings_field(
		'custom_message',
		esc_html__('Custom Message', 'bamcustomlogin'),
		'bamcustomlogin_callback_field_textarea',
		'bamcustomlogin', 
		'bamcustomlogin_section_login', 
		[ 'id' => 'custom_message', 'label' => esc_html__('Custom text and/or markup', 'bamcustomlogin') ]
	);
	
	add_settings_field(
		'custom_footer',
		esc_html__('Custom Footer', 'bamcustomlogin'),
		'bamcustomlogin_callback_field_text',
		'bamcustomlogin', 
		'bamcustomlogin_section_admin', 
		[ 'id' => 'custom_footer', 'label' => esc_html__('Custom footer text', 'bamcustomlogin') ]
	);
	
	add_settings_field(
		'custom_toolbar',
		esc_html__('Custom Toolbar', 'bamcustomlogin'),
		'bamcustomlogin_callback_field_checkbox',
		'bamcustomlogin', 
		'bamcustomlogin_section_admin', 
		[ 'id' => 'custom_toolbar', 'label' => esc_html__('Remove new post and comment links from the Toolbar', 'bamcustomlogin') ]
	);
	
	add_settings_field(
		'custom_scheme',
		esc_html__('Custom Scheme', 'bamcustomlogin'),
		'bamcustomlogin_callback_field_select',
		'bamcustomlogin', 
		'bamcustomlogin_section_admin', 
		[ 'id' => 'custom_scheme', 'label' => esc_html__('Default color scheme for new users', 'bamcustomlogin') ]
	);
    
} 
add_action( 'admin_init', 'bamcustomlogin_register_settings' );


