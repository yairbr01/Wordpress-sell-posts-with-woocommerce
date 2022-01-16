add_action( 'woocommerce_order_status_completed', 'yair_update_property_after_payment' );

//woocommerce_payment_complete_order_status_completed
function yair_update_property_after_payment( $order_id ){
	
	$order = wc_get_order( $order_id );	
	
	$post_id = get_post_meta( $order_id, 'property_id', true );
	
	$order = wc_get_order( $order_id );
	$items = $order->get_items();	
	foreach ( $items as $item ) {
    	$product_id = $item->get_product_id();
	}
	
	update_post_meta( $post_id, 'ad_type', $product_id );
		
	if ( ('private' == get_post_status( $post_id )) ) {
		wp_update_post(array(
        	'ID'    =>  $post_id,
        	'post_status'   =>  'pending'
        ));
	}		
	
	global $woocommerce;
	$woocommerce->cart->empty_cart();
}
