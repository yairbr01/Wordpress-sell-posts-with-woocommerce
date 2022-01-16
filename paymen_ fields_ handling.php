function checkout_remove_fields( $woo_checkout_fields_array ) {

  // unset( $woo_checkout_fields_array['billing']['billing_first_name'] );
	// unset( $woo_checkout_fields_array['billing']['billing_phone'] );
	// unset( $woo_checkout_fields_array['billing']['billing_email'] );

	unset( $woo_checkout_fields_array['billing']['billing_address_1'] );
	unset( $woo_checkout_fields_array['billing']['billing_last_name'] );
	unset( $woo_checkout_fields_array['order']['order_comments'] );
	unset( $woo_checkout_fields_array['billing']['billing_company'] );
	unset( $woo_checkout_fields_array['billing']['billing_country'] );
	unset( $woo_checkout_fields_array['billing']['billing_address_2'] );
	unset( $woo_checkout_fields_array['billing']['billing_city'] );
	unset( $woo_checkout_fields_array['billing']['billing_state'] );
	unset( $woo_checkout_fields_array['billing']['billing_postcode'] );

	return $woo_checkout_fields_array;
}
add_filter( 'woocommerce_checkout_fields', 'checkout_remove_fields', 9999 );


function checkout_property_id_filed( $checkout ){

	woocommerce_form_field( 'property_id', array(
		'type'          => 'text',
		'required'	=> true,
		'default' => $_COOKIE[property_id],
		'class'         => array('property_id'),
		'label'         => 'Post ID for upgrade',
		'label_class'   => 'post_id_for_update_label',		
		), $checkout->get_value( 'property_id' ) );

}
function checkout_property_id_save( $order_id ){

	if( !empty( $_POST['property_id'] ) )
		update_post_meta( $order_id, 'property_id', sanitize_text_field( $_POST['property_id'] ) );

}
add_action( 'woocommerce_after_checkout_billing_form', 'checkout_property_id_filed' );
add_action( 'woocommerce_checkout_update_order_meta', 'checkout_property_id_save' );

function checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Post ID for upgrade').':</strong> <br/>' . get_post_meta( $order->get_id(), 'property_id', true ) . '</p>';
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'checkout_field_display_admin_order_meta', 10, 1 );
