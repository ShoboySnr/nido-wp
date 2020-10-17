<?php
$color = rpress_get_option( 'checkout_color', 'red' );

$get_all_items = rpress_get_categories();
ob_start();
?>
<div class="rp-col-lg-3 rp-col-md-3 rp-col-sm-3 rp-col-xs-12 sticky-sidebar cat-lists">
  <div class="rpress-filter-toggle">
    <span class="rpress-filter-toggle-text">
      <?php echo __('Categories', 'pearl'); ?>
    </span>
  </div>
  
  <div class="rpress-filter-wrapper">
    <div class="rpress-categories-menu">
      <?php do_action('rpress_before_category_list'); ?>
      <?php
        if( is_array($get_all_items) && !empty($get_all_items) ) :
      ?>
      <ul class="rpress-category-lists">
        <?php 
        foreach ($get_all_items as $key => $get_all_item) : ?>
          <li class="rpress-category-item ">
            <a href="#<?php echo esc_attr($get_all_item->slug); ?>" data-id="<?php echo esc_attr($get_all_item->term_id); ?>" class="rpress-category-link  nav-scroller-item <?php echo esc_attr($color); ?>"><?php echo esc_html($get_all_item->name); ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
      <?php
      endif;
      ?>
      <?php do_action('rpress_after_category_list'); ?>
    </div>
  </div>
</div>
<?php
echo ob_get_clean();