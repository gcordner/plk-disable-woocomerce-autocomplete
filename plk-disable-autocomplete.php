<?php
/**
 * Plugin Name: PLK WooCommerce Checkout Autocomplete Disabler
 * Plugin URI: https://paylesskratom.com/
 * Description: This plugin disables autocomplete for specific WooCommerce checkout fields.
 * Version: 1.0
 * Author: Geoff Cordner
 * Author URI: https://geoffcordner.net/
 */
add_filter( 'woocommerce_form_field_args', 'custom_woocommerce_form_field_args', 10, 3 );
function custom_woocommerce_form_field_args( $args, $key, $value ) {
	// List of fields to disable autocomplete.
	$fields_to_disable_autocomplete = array(
		'shipping_first_name',
		'shipping_last_name',
		'shipping_address_1',
		'shipping_address_2',
		'shipping_city',
		'select2-billing_state-container',
		'shipping_postcode',
	);

	// If the key of the current field is in the list, set its 'autocomplete' attribute to 'off'.
	if ( in_array( $key, $fields_to_disable_autocomplete, true ) ) {
		$args['autocomplete'] = 'off';
	}

	// Return the possibly-updated arguments.
	return $args;
}
