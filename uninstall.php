<?php
/**
 * Plugin Name: Uninstall
 * Plugin URI: http://wordpress.org/plugins/uninstall/
 * Description: Remove wordpress file and database fast
 * Author: Ronni Skansing
 * Version: 1.0
 * Author URI: https://github.com/RonnieSkansing
 * License: GPL2
**/
add_action( 'admin_menu', function()
{
	add_management_page( 'Uninstall WP', 'Uninstall', 'manage_options', 'uninstall', function()
	{
		require('resources/uninstall.php');
	});
});
if(is_admin())
{
	add_action( 'wp_ajax_uninstall', function()
	{
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
}
