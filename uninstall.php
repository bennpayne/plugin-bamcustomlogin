<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

/*
	
	uninstall.php
	
	- fires when plugin is uninstalled via the Plugins screen
	
*/



// exit if uninstall constant is not defined
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	
	exit;
	
}



// delete the plugin options
delete_option( 'bamcustomlogin_options' );


