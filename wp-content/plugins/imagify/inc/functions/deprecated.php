<?php
defined( 'ABSPATH' ) || die( 'Cheatin\' uh?' );

/**
 * Deprecated imagify.io API for WordPress.
 *
 * @since 1.6.5
 */
class Imagify_Deprecated {

	/**
	 * A shorthand to display a message about a deprecated method.
	 *
	 * @since 1.6.5
	 * @author Grégory Viguier
	 *
	 * @param string $method_name The deprecated method.
	 */
	protected function deprecated_camelcased_method( $method_name ) {
		$class_name      = get_class( $this );
		$new_method_name = preg_replace( '/[A-Z]/', '_$0', $method_name );
		_deprecated_function( $class_name . '::' . $method_name . '()', '1.6.5', $class_name . '::' . $new_method_name . '()' );
	}

	/**
	 * Main Instance.
	 * Ensures only one instance of class is loaded or can be loaded.
	 * Well, actually it ensures nothing since it's not a full singleton pattern.
	 *
	 * @return object Main instance.
	 */
	public static function instance() {
		$class_name = get_class( $this );
		_deprecated_function( $class_name . '::' . __FUNCTION__ . '()', '1.6.5', 'imagify()' );
		return Imagify::get_instance();
	}

	/**
	 * Get your Imagify account infos.
	 *
	 * @return object
	 */
	public function getUser() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_user();
	}

	/**
	 * Create a user on your Imagify account.
	 *
	 * @param  array $data All user data. Details here: --.
	 * @return object
	 */
	public function createUser( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->create_user( $data );
	}

	/**
	 * Update an existing user on your Imagify account.
	 *
	 * @param  string $data All user data. Details here: --.
	 * @return object
	 */
	public function updateUser( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->update_user( $data );
	}

	/**
	 * Check your Imagify API key status.
	 *
	 * @param  string $data The license key.
	 * @return object
	 */
	public function getStatus( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_status( $data );
	}

	/**
	 * Get the Imagify API version.
	 *
	 * @return object
	 */
	public function getApiVersion() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_api_version();
	}

	/**
	 * Get Public Info.
	 *
	 * @return object
	 */
	public function getPublicInfo() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_public_info();
	}

	/**
	 * Optimize an image from its binary content.
	 *
	 * @param  string $data All options. Details here: --.
	 * @return object
	 */
	public function uploadImage( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->upload_image( $data );
	}

	/**
	 * Optimize an image from its URL.
	 *
	 * @param  string $data All options. Details here: --.
	 * @return object
	 */
	public function fetchImage( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->fetch_image( $data );
	}

	/**
	 * Get prices for plans.
	 *
	 * @return object
	 */
	public function getPlansPrices() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_plans_prices();
	}

	/**
	 * Get prices for packs (one time).
	 *
	 * @return object
	 */
	public function getPacksPrices() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_packs_prices();
	}

	/**
	 * Get all prices (packs & plans included).
	 *
	 * @return object
	 */
	public function getAllPrices() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_all_prices();
	}

	/**
	 * Get all prices (packs & plans included).
	 *
	 * @param  string $coupon A coupon code.
	 * @return object
	 */
	public function checkCouponCode( $coupon ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->check_coupon_code( $coupon );
	}

	/**
	 * Get information about current discount.
	 *
	 * @return object
	 */
	public function checkDiscount() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->check_discount();
	}

	/**
	 * Make an HTTP call using curl.
	 *
	 * @param  string $url  The URL to call.
	 * @param  array  $args The request args.
	 * @return object
	 */
	private function httpCall( $url, $args = array() ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->http_call( $url, $args );
	}
}


if ( class_exists( 'WpeCommon' ) ) :

	/**
	 * Change the limit for the number of posts: WP Engine limits SQL queries size to 2048 octets (16384 characters).
	 *
	 * @since  1.4.7
	 * @since  1.6.7 Deprecated.
	 * @author Jonathan Buttigieg
	 *
	 * @return int
	 */
	function _imagify_wengine_unoptimized_attachment_limit() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.7', '_imagify_wpengine_unoptimized_attachment_limit()' );
		return _imagify_wpengine_unoptimized_attachment_limit();
	}

endif;

if ( function_exists( 'emr_delete_current_files' ) ) :

	/**
	 * Re-Optimize an attachment after replace it with Enable Media Replace.
	 *
	 * @since  1.0
	 * @since  1.6.9 Deprecated.
	 * @author Jonathan Buttigieg
	 *
	 * @param string $guid A post guid.
	 */
	function _imagify_optimize_enable_media_replace( $guid ) {
		global $wpdb;

		_deprecated_function( __FUNCTION__ . '()', '1.6.9', 'imagify_enable_media_replace()->optimize()' );

		$attachment_id = (int) $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $guid ) );

		// Stop if the attachment wasn't optimized yet by Imagify.
		if ( ! get_post_meta( $attachment_id, '_imagify_data', true ) ) {
			return;
		}

		$optimization_level = get_post_meta( $attachment_id, '_imagify_optimization_level', true );
		$class_name         = get_imagify_attachment_class_name( 'wp', $attachment_id, 'enable-media-replace-upload-done' );
		$attachment         = new $class_name( $attachment_id );

		// Remove old optimization data.
		$attachment->delete_imagify_data();

		// Optimize it!!!!!
		$attachment->optimize( $optimization_level );
	}

endif;
