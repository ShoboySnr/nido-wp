<?php
$pearl_include_path = get_template_directory() . '/includes/';
$pearl_admin_includes_path = $pearl_include_path . 'admin/';
$pearl_theme_include_path = $pearl_include_path . 'theme/';
$pearl_widgets_path = $pearl_include_path . '/widgets/';

/*Helpers*/
require_once($pearl_theme_include_path . 'lib/array_helper.php');

/*Theme setups (image sizes, content width, post supports, sidebars, menus);*/
require_once($pearl_theme_include_path . 'setups.php');

/*Register scripts/styles*/
require_once($pearl_theme_include_path . 'enqueue.php');

/*Custom theme functions*/
require_once($pearl_theme_include_path . 'theme.php');
require_once($pearl_theme_include_path . 'theme-ajax.php');
require_once($pearl_theme_include_path . 'print_styles.php');
require_once($pearl_theme_include_path . 'layout_config.php');
require_once($pearl_theme_include_path . 'template_hooks.php');
require_once($pearl_theme_include_path . 'comments.php');
require_once($pearl_theme_include_path . 'post_stats.php');

/*Header helper functions*/
require_once($pearl_theme_include_path . 'header_helpers.php');

/*WooCommerce*/
if (class_exists('WooCommerce')) {
	require_once($pearl_theme_include_path . '/woocommerce/woocommerce.php');
}

if (defined('WPB_VC_VERSION')) {
	require_once($pearl_theme_include_path . '/vc/helpers.php');
	require_once($pearl_theme_include_path . '/vc/visual_composer.php');
	require_once($pearl_theme_include_path . '/vc/grid_builder.php');
}

/*Admin includes*/
if (is_admin()) {
	/*Product registration*/
	require_once($pearl_admin_includes_path . '/product_registration/admin.php');

	/*Theme options*/
	require_once($pearl_admin_includes_path . 'theme_options/main.php');
	require_once($pearl_admin_includes_path . 'theme_options/includes/presets.php');
	require_once($pearl_admin_includes_path . 'theme_options/includes/helpers.php');
	require_once($pearl_admin_includes_path . 'theme_options/screen.php');
	require_once($pearl_admin_includes_path . 'theme_options/includes/enqueue.php');

	/*TGM for plugins registration*/
	require_once($pearl_admin_includes_path . 'tgm/registration.php');

	/*Admins styles*/
	require_once($pearl_admin_includes_path . 'enqueue.php');

	/*Visual composer*/
	if (defined('WPB_VC_VERSION')) {
		require_once($pearl_theme_include_path . '/vc/main.php');
	}

	/*admin helpers*/
	require_once($pearl_admin_includes_path . '/admin_helpers.php');
	
	/*Taxonomy fields*/
	require_once($pearl_admin_includes_path . '/taxonomy_fields/main.php');
}

function pearl_glob_pagenow(){
    global $pagenow;
    return $pagenow;
}

function pearl_glob_wpdb(){
    global $wpdb;
    return $wpdb;
}

remove_action( 'rpress_get_cart', 'rpress_get_cart_items' );
add_action( 'rpress_get_cart', 'pearl_rpress_get_cart_items' );
function pearl_rpress_get_cart_items() {
  $class = rpress_get_cart_quantity() == 0 ? 'no-items' : '';
?>
  <div class="rp-col-lg-3 rp-col-md-3 rp-col-sm-12 rp-col-xs-12 pull-right rpress-sidebar-cart item-cart sticky-sidebar">
    <div class="rpress-mobile-cart-icons <?php echo esc_attr($class); ?>">
      <i class='fa fa-shopping-cart' aria-hidden='true'></i>
      <span class='rpress-cart-badge rpress-cart-quantity'>
        <?php echo rpress_get_cart_quantity(); ?>
      </span>
    </div>
    <div class='rpress-sidebar-main-wrap'>
      <i class='fa fa-times close-cart-ic' aria-hidden='true'></i>
      <div class="rpress-sidebar-cart-wrap">
        <?php echo rpress_shopping_cart(); ?>
      </div>
    </div>
  </div>
  <?php
}

remove_action('rpress_purchase_login_options', 'rpress_checkout_user_account');
add_action('rpress_purchase_login_options', 'pearl_checkout_user_account');
function pearl_checkout_user_account() {
	$color = rpress_get_option( 'checkout_color', 'red' );
	$color = ( $color == 'inherit' ) ? '' : $color;
?>
		<fieldset id="rpress_checkout_login_register" class="rpress-checkout-account-wrap rpress-checkout-block">
			<legend><?php _e('Account', 'pearl'); ?></legend>
			<p><?php _e('To place your order now, log into your existing account or signup now!', 'pearl'); ?></p>
			<div class="clear"></div>
			<div class="rpress-checkout-button-actions">
				<div class="rp-col-md-4 rp-col-lg-4 rp-col-sm-6">
					<span><?php _e('Have an account?', 'pearl'); ?></span>
					<a href="<?php echo esc_url( add_query_arg( 'login', 1 ) ); ?>" class="rpress_checkout_register_login rpress-submit button <?php echo esc_attr($color); ?>" data-action="checkout_login"><?php _e( 'Login', 'pearl' ); ?></a>
				</div>
				<div class="rp-col-md-8 rp-col-sm-6">
					<span><?php echo sprintf( __( 'New to %s?', 'pearl' ), get_bloginfo( 'name' ) ); ?></span>
					<a href="<?php echo esc_url( remove_query_arg('login') ); ?>" class="rpress_checkout_register_login rpress-submit button <?php echo esc_attr($color); ?>" data-action="checkout_register">
						<?php _e( 'Register', 'pearl' ); if(!rpress_no_guest_checkout()) { echo ' ' . __( 'or checkout as a guest', 'pearl' ); } ?>
					</a>
				</div>
			</div>
		</fieldset>
	<?php
}