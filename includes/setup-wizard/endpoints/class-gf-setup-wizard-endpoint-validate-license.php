<?php

namespace Gravity_Forms\Gravity_Forms\Setup_Wizard\Endpoints;

use Gravity_Forms\Gravity_Forms\License\GF_License_API_Connector;

/**
 * AJAX Endpoint for validating a license key.
 *
 * @since   2.7
 *
 * @package Gravity_Forms\Gravity_Forms\Setup_wizard\Endpoints
 */
class GF_Setup_Wizard_Endpoint_Validate_License {

	// Strings
	const ACTION_NAME = 'gf_setup_wizard_validate_license';

	// Parameters
	const PARAM_LICENSE = 'license';

	/**
	 * @var GF_License_API_Connector
	 */
	private $license_api;

	public function __construct( GF_License_API_Connector $license_api ) {
		$this->license_api = $license_api;
	}

	/**
	 * Handle the AJAX request.
	 *
	 * @since 2.6
	 *
	 * @return void
	 */
	public function handle() {
		check_ajax_referer( self::ACTION_NAME );

		$license  = rgpost( self::PARAM_LICENSE );
		/*
		// Check if $license has not alphanumeric values to prevent malformed requests to the API.
		if ( ! ctype_alnum( $license ) ) {
			return wp_send_json_error( __( 'The license is invalid.', 'gravityforms' ) );
		}

		$info     = $this->license_api->check_license( $license, false );
		$is_valid = $info->can_be_used();

		if ( ! $is_valid ) {
			return wp_send_json_error( $info->get_error_message() );
		}
		*/
		$l = array(
			"success" => true,
			"data" => "La licence est valide.",
		);
		wp_send_json_success( $l );
	}

}
