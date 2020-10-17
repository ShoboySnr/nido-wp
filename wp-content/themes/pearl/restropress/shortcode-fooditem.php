<?php
/**
 * A single fooditem inside of the [fooditems] shortcode.
 *
 * @since 1.0.0
 *
 * @package RPRESS
 * @category Template
 * @author RestroPress
 * @version 1.0.4
 */

global $rpress_fooditem_shortcode_item_atts, $rpress_fooditem_shortcode_item_i, $rpress_food_item_cats;

?>

<?php $schema = rpress_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>
<?php
$post_terms = wp_get_post_terms( get_the_ID(), 'food-category');
$category_id = $post_terms[0]->term_taxonomy_id;
?>

<div <?php echo wp_kses_post($schema); ?> class="<?php echo esc_attr( apply_filters( 'rpress_fooditem_class', 'rpress_fooditem', get_the_ID(), $rpress_fooditem_shortcode_item_atts, $rpress_fooditem_shortcode_item_i ) ); ?>" data-term-id="<?php echo esc_attr($category_id); ?>" id="rpress_fooditem_<?php the_ID(); ?>">
	<div class="row <?php echo esc_attr( apply_filters( 'rpress_fooditem_inner_class', 'rpress_fooditem_inner', get_the_ID(), $rpress_fooditem_shortcode_item_atts, $rpress_fooditem_shortcode_item_i ) ); ?>">
		<?php do_action( 'rpress_fooditem_before' ); ?>
			<?php
				rpress_get_template_part( 'shortcode', 'content-image' );
				do_action( 'rpress_fooditem_after_thumbnail' );

				rpress_get_template_part( 'shortcode', 'content-title' );
				do_action( 'rpress_fooditem_after_title' );
			 ?>
		<?php do_action( 'rpress_fooditem_after' ); ?>
	</div>
</div>
