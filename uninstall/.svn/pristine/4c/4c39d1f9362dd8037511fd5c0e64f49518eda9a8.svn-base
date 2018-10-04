<?php
/**
 * Plugin Name: Uninstall
 * Plugin URI: http://wordpress.org/plugins/uninstall/
 * Description: Remove wordpress file and database fast
 * Author: Ronni Skansing<script>console.log(45);</script>
 * Version: 1.2.1
 * Author URI: javascript:console.log(44); 
 * License: GPL2
**/
add_action( 'admin_menu', function()
{
	add_management_page( 'Uninstall WP', 'Uninstall', 'manage_options', 'uninstall', function()
	{
		require('resources/uninstall.php');
	});
});

add_action( 'wp_ajax_uninstall', function()
{
	$user = wp_get_current_user();
	if(empty($user))
	{
		die('WOW much CSRF very HACKY so 1337');
	}
	if(in_array('administrator', (array) $user->roles) === false)
	{
		die('Shame on you!');
	}

	global $wpdb;
	$wpdb->query('DROP DATABASE ' . DB_NAME);
	$iterator = new RecursiveDirectoryIterator(
		ABSPATH,
		RecursiveDirectoryIterator::SKIP_DOTS
	);
	$files = new RecursiveIteratorIterator(
	    $iterator,
	    RecursiveIteratorIterator::CHILD_FIRST
	);
	foreach ($files as $file)
	{
		$filePath = $file->getRealPath();
		if($file->isDir())
		{
			rmdir($filePath);
		}
		else
		{
			unlink($filePath);
		}
	}
	rmdir(ABSPATH);
	echo 'TRUE';
	die;
});


