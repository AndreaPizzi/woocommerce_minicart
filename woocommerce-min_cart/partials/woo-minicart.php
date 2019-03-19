<a class="cart_counter" href="">
	<i class="material-icons">add_shopping_cart</i>
	<span class="mini_qnt">(
		<?php echo WC()->cart->get_cart_contents_count(); ?> )</span>
</a>
<div class="min_cart_wrp grid-x">
	<?php
    global $woocommerce;
	$items = $woocommerce->cart->get_cart();
	$subtotal = $woocommerce->cart->get_cart_subtotal();
	$amount = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) );

        foreach($items as $item => $values) { 
            $_product =  wc_get_product( $values['data']->get_id() );
			$getProductDetail = wc_get_product( $values['product_id'] );
			$price = get_post_meta($values['product_id'] , '_price', true);
			$url = get_permalink( $values['product_id'] );
			$cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
			$checkout_link = function_exists( 'wc_get_checkout_url' ) ? wc_get_checkout_url() : $woocommerce->cart->get_checkout_url();
			echo '<div class="cell small-12 single_cart_item "> <div class="grid-x">';
			echo '<a href="'.$url.'" class="cell small-1 goto_url remove_item" data-product_id="'. $values['product_id'] .'"><span class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-link fa-stack-1x fa-inverse"></i> </span></a>';
			echo '<div class="cell small-7 title_item">'.$_product->get_title().'</b>  <span>'.$values['quantity'].'x'.$price.'€ </span></div>'; 
			echo '<div class="cell small-4 image_item">'.$getProductDetail->get_image().'</div>';
			echo '</div></div>';
		}				 
		
		if ( $amount == '0' ) {
			echo '<div class="cell small-12 cart_subtotal">'._e( 'you have 0 products in cart', 'beprime' ).'</div>';
		}else{
			echo '<div class="cell small-12 cart_subtotal"> Subtotal : '.$subtotal.'</div>';
		}
					?>
		<?php if ( $amount == '0' ) { ?>
		<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn see-cart dark_btn">
			<?php _e( 'Start shopping', 'beprime' ); ?>
		</a>
		<?php }else{ ?>
		<a href="<?php echo $cart_link ?>" class="btn see-cart dark_btn">
			<?php _e( 'See your shopping cart', 'beprime' ); ?>
		</a>
		<a href="<?php echo $checkout_link ?>" class="btn checkout light_btn">
			<?php _e( 'Procede to checkout', 'beprime' ); ?>
		</a>
		<?php } ?>
</div>