<div class="rpress-title-holder">
  <?php $item_prop = rpress_add_schema_microdata() ? ' itemprop="name"' : ''; ?>
  <h3<?php echo esc_attr($item_prop); ?> class="rpress_fooditem_title">
    <a class="food-title" itemprop="url"><?php the_title();?></a>
    <span class="price">
      <?php
      global $post;
      $price = get_post_meta($post->ID,'rpress_price',true);
      echo rpress_currency_filter( rpress_format_amount( $price ) );
      ?>
    </span>
  </h3>
  <?php $excerpt_length =  apply_filters( 'rpress_excerpt_length', 28 ); ?>
  <?php $item_prop = rpress_add_schema_microdata() ? ' itemprop="description"' : ''; ?>
  <div<?php echo esc_attr($item_prop); ?> class="rpress_fooditem_excerpt">
    <?php if ( has_excerpt() ) : ?>
      <?php echo apply_filters( 'rpress_fooditems_excerpt', wp_trim_words( get_post_field( 'post_excerpt', get_the_ID() ), $excerpt_length ) ); ?>
    <?php elseif ( get_the_content() ) : ?>
      <?php echo apply_filters( 'rpress_fooditems_excerpt', wp_trim_words( get_post_field( 'post_content', get_the_ID() ), $excerpt_length ) ); ?>
    <?php endif; ?>
  </div>
</div>
<div class="rpress_fooditem_buy_button">
  <?php echo rpress_get_purchase_link( array( 'fooditem_id' => get_the_ID() ) ); ?>
</div>