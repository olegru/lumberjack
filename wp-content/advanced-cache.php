<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'WP_ROCKET_ADVANCED_CACHE', true );
$rocket_cache_path = 'C:\projects\lumberjack\root/wp-content/cache/wp-rocket/';
$rocket_config_path = 'C:\projects\lumberjack\root/wp-content/wp-rocket-config/';

if ( file_exists( 'C:\projects\lumberjack\root\wp-content\plugins\wp-rocket\inc\front/process.php' ) ) {
	include( 'C:\projects\lumberjack\root\wp-content\plugins\wp-rocket\inc\front/process.php' );
} else {
	define( 'WP_ROCKET_ADVANCED_CACHE_PROBLEM', true );
}