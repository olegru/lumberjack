<?php
defined( 'ABSPATH' ) || die( 'Cheatin\' uh?' );

add_action( 'wp_ajax_imagify_ngg_get_unoptimized_attachment_ids', '_do_wp_ajax_imagify_ngg_get_unoptimized_attachment_ids' );
/**
 * Get all unoptimized attachment ids.
 *
 * @since 1.0
 * @author Jonathan Buttigieg
 */
function _do_wp_ajax_imagify_ngg_get_unoptimized_attachment_ids() {
	global $wpdb;

	check_ajax_referer( 'imagify-bulk-upload', 'imagifybulkuploadnonce' );

	if ( ! current_user_can( 'upload_files' ) ) {
		wp_send_json_error();
	}

	$user = new Imagify_User();

	if ( $user->is_over_quota() ) {
		wp_send_json_error( array( 'message' => 'over-quota' ) );
	}

	@set_time_limit( 0 );

	$optimization_level = (int) $_GET['optimization_level'];
	$optimization_level = ( -1 !== $optimization_level ) ? $optimization_level : get_imagify_option( 'optimization_level', 1 );
	$optimization_level = (int) $optimization_level;

	/**
	 * Filter the unoptimized attachments limit query.
	 *
	 * @since 1.4.4
	 *
	 * @param int The limit (-1 for unlimited).
	 */
	$unoptimized_attachment_limit = apply_filters( 'imagify_unoptimized_attachment_limit', 10000 );

	$storage   = C_Gallery_Storage::get_instance();
	$ngg_table = $wpdb->prefix . 'ngg_pictures';
	$data      = array();
	$images    = $wpdb->get_results( $wpdb->prepare( // WPCS: unprepared SQL ok.
		"SELECT picture.pid as id, picture.filename, idata.optimization_level, idata.status, idata.data
		 FROM $ngg_table as picture
		 LEFT JOIN $wpdb->ngg_imagify_data as idata
		 ON picture.pid = idata.pid
		 WHERE idata.pid IS NULL
			OR idata.optimization_level != %d
			OR idata.status = 'error'
		LIMIT %d",
		$optimization_level,
		$unoptimized_attachment_limit
	), ARRAY_A );

	// Save the optimization level in a transient to retrieve it later during the process.
	set_transient( 'imagify_bulk_optimization_level', $optimization_level );

	foreach ( $images as $image ) {
		$id        = absint( $image['id'] );
		$file_path = $storage->get_image_abspath( $id );

		/** This filter is documented in inc/functions/process.php. */
		$file_path = apply_filters( 'imagify_file_path', $file_path );

		if ( ! $file_path || ! file_exists( $file_path ) ) {
			continue;
		}

		$attachment_data  = maybe_unserialize( $image['data'] );
		$attachment_error = '';

		if ( isset( $attachment_data['sizes']['full']['error'] ) ) {
			$attachment_error = $attachment_data['sizes']['full']['error'];
		}

		$attachment_error              = trim( $attachment_error );
		$attachment_status             = $image['status'];
		$attachment_optimization_level = $image['optimization_level'];
		$attachment_backup_path        = get_imagify_ngg_attachment_backup_path( $file_path );

		// Don't try to re-optimize if the optimization level is still the same.
		if ( $optimization_level === $attachment_optimization_level && is_string( $attachment_error ) ) {
			continue;
		}

		// Don't try to re-optimize if there is no backup file.
		if ( 'success' === $attachment_status && $optimization_level !== $attachment_optimization_level && ! file_exists( $attachment_backup_path ) ) {
			continue;
		}

		// Don't try to re-optimize images already compressed.
		if ( 'already_optimized' === $attachment_status && $attachment_optimization_level >= $optimization_level ) {
			continue;
		}

		// Don't try to re-optimize images with an empty error message.
		if ( 'error' === $attachment_status && empty( $attachment_error ) ) {
			continue;
		}

		$data[ '_' . $id ] = $storage->get_image_url( $id );
	} // End foreach().

	if ( $data ) {
		wp_send_json_success( $data );
	}

	wp_send_json_error( array( 'message' => 'no-images' ) );
}
