add_action( 'jet-engine-booking/publish_payment', function( $data ) {	
	$post_id = $data[ 'inserted_post_id' ];
	if ( empty( $post_id ) ) {
		$post_id = $data[ 'post_id' ];
	}	
	$product_id = $data[ 'ad_type' ];
	
	global $woocommerce;
    $woocommerce->cart->empty_cart();
    $woocommerce->cart->add_to_cart($product_id);	

	$cookie_name = "property_id";
	$cookie_value = $post_id;
	setcookie($cookie_name, $cookie_value, time() + (120), "/");	
}
);
