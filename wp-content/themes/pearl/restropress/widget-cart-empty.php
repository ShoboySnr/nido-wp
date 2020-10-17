<?php
	$cart_quantity = rpress_get_cart_quantity();
	$display       = $cart_quantity > 0 ? '' : ' style="display:none;"';
	$color = rpress_get_option( 'checkout_color', 'red' );
?>
<li class="cart_item empty"><?php echo rpress_empty_cart_message(); ?></li>

<li class="cart_item rpress-cart-meta rpress_total" style="display:none;">
	<?php _e( 'Total (', 'pearl' ); ?>
	<span class="rpress-cart-quantity" <?php echo wp_kses_post($display); ?>>
		<?php echo esc_html($cart_quantity); ?>
	</span> <?php _e( ' Items)', 'pearl' ); ?>
	<span class="cart-total <?php echo esc_attr($color); ?>">
		<?php echo rpress_currency_filter( rpress_format_amount( rpress_get_cart_total() ) ); ?>
	</span>
</li>

<li class="delivery-items-options" style="display:none">
	<?php echo get_delivery_options( true ); ?>
</li>

<li class="cart_item rpress_checkout" style="display:none;"><a href="<?php echo rpress_get_checkout_uri(); ?>" class="button"><?php _e( 'Checkout', 'pearl' ); ?></a></li>