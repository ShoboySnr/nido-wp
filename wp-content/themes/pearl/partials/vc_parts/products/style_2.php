<div class="stm_product__single">
    <a href="<?php the_permalink(); ?>" <?php the_title_attribute(); ?>>
        <?php if (has_post_thumbnail()) { ?>
            <?php if (!empty($img_size)): ?>
                <div class="product_thumbnail"><?php echo wp_kses_post(pearl_get_VC_img(get_post_thumbnail_id(), $img_size)); ?></div>
            <?php else: ?>
                <div class="product_thumbnail"><?php the_post_thumbnail('pearl-img-80-80', array('class' => 'img-responsive')); ?></div>
            <?php endif; ?>
        <?php } ?>
        <span class="product_info">
            <h4 class="no_line stm_animated"><?php the_title(); ?></h4>
            <?php
                $id = get_the_ID();
                $products_category = get_the_terms(get_the_ID(), 'products_category');
                if (!empty( $products_category )) {
                    foreach ( $products_category as $category ) {
                        $cat_parent = $category->parent;
                        if ($cat_parent == 0) {
                            echo '<span class="product_category mtc">';
                            echo esc_attr($category->name);
                            echo '</span>';
                        }
                    }
                }
            ?>
        </span>
    </a>
</div>