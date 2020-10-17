<?php

$args = array(
    'post_type' => 'stm_testimonials',
    'posts_per_page' => intval($number),
    'post_status' => 'publish'
);

$number_row = (empty($number_row)) ? '1' : $number_row;

$q = new WP_Query($args);

/*Carousel or not*/
$carousel = (pearl_check_string($carousel)) ? true : false;
$row_class = 'owl-carousel';
$item_classes = 'stm_testimonials__item stm_owl__glitches stc_b';
if(!$carousel) {
    $item_wrapper = 'col-md-' . intval(12 / $list_number_row) . ' col-sm-6 col-xs-12';
    $item_classes = 'stm_testimonials__item col-md-12 stm_mgb_30';
    $row_class = 'row';
    $classes[] = 'stm_testimonials_list_style';
}

$loop = 'false';

if (!empty($number)) {
    $loop = $number > 1 ? 'true' : 'false';
} else {
    $loop = $q->post_count > 1 ? 'true' : 'false';
}

if($q->have_posts()):
    $id = 'stm_testimonial__carousel_' . pearl_random();
    ?>
    <div class="<?php echo esc_attr(implode(' ', $classes)); ?>">
        <div class="stm_testimonials__header">
            <?php if (!empty($title)) : ?>
            <h2 class='stm_testimonials__title'><?php echo esc_html($title) ?></h2>
            <?php endif; ?>
            <div class="stm_testimonials__nav">
                <div class="stm_testimonials__nav-btn prev mbc_h"></div>
                <div class="stm_testimonials__nav-btn next mbc_h"></div>
            </div>
        </div>
        <?php if ($show_partners_logo  == 'true') : ?>
            <div class="image_dots">
                <?php while($q->have_posts()): $q->the_post();
                    $post_id = get_the_ID();
                    $partner_logo = get_post_meta($post_id, 'partner_logo', true);
                    $partner_logo_img = wp_get_attachment_image( $partner_logo, 'full' );
                    ?>
                    <?php if($carousel): ?>
                        <?php if(!empty($partner_logo)): ?>
                            <div class="dots"><?php echo wp_kses_post( $partner_logo_img ); ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="stm_testimonial__carousel <?php echo esc_attr($row_class); ?>" id="<?php echo esc_attr($id) ?>">
            <?php while($q->have_posts()): $q->the_post();
                $post_id = get_the_ID();
                $review = get_post_meta($post_id, 'review', true);
                $name = get_post_meta($post_id, 'stm_default_title', true);
                $position = get_post_meta($post_id, 'company', true);
                $image = pearl_get_VC_img(get_post_thumbnail_id( $post_id ), $img_size);
                if(!empty(intval($crop))) $review = pearl_minimize_word($review, intval($crop));
                ?>
                <?php if(!$carousel): ?>
                    <div class="<?php echo esc_attr($item_wrapper); ?>">
                <?php endif; ?>
                <div <?php post_class($item_classes); ?>>
                    <div class="stm_testimonials__review"><?php echo wp_kses_post($review); ?></div>
                    <div class="stm_testimonials__meta">
                        <?php if (!empty($image) and $show_image == 'true') : ?>
                        <div class="stm_testimonials__avatar stm_testimonials__avatar_rounded">
                            <?php echo html_entity_decode($image); ?>
                        </div>
                        <?php endif; ?>

                        <div class="stm_testimonials__info">
                            <?php if(!empty($name)): ?>
                                <div class="stm_testimonials__name"><?php echo sanitize_text_field($name); ?></div>
                            <?php endif; ?>
                            
                            <div class="stm_testimonials__stars mtc">
                                <i class="stmicon-star2"></i>
                                <i class="stmicon-star2"></i>
                                <i class="stmicon-star2"></i>
                                <i class="stmicon-star2"></i>
                                <i class="stmicon-star2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!$carousel): ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php if ($show_image_bullets  == 'true') : ?>
            <div class="image_dots">
                <?php while($q->have_posts()): $q->the_post();
                    $post_id = get_the_ID();
                    $image = pearl_get_VC_img(get_post_thumbnail_id( $post_id ), $img_size);
                    ?>
                    <?php if($carousel): ?>
                        <?php if (!empty($image) and $show_image == 'true') : ?>
                            <div class="dots"><?php echo html_entity_decode($image); ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if($carousel): ?>
    <script>
        (function($) {
            "use strict";
            var owl = $('#<?php echo esc_js($id); ?>');

            $(document).ready(function () {
                var owlRtl = false;
                if( $('body').hasClass('rtl') ) {
                    owlRtl = true;
                }

                owl.owlCarousel({
                    rtl: owlRtl,
                    items: <?php echo esc_js($number_row); ?>,
                    autoWidth: true,
                    <?php if ($show_partners_logo  == 'true' or $show_image_bullets  == 'true') : ?>
                    dotsContainer: '.image_dots',
                    <?php endif; ?>
                    autoplay: <?php echo esc_js($autoscroll); ?>,
                    nav: false,
                    dots: false,
                    navText: [],
                    margin: <?php echo esc_js($margin); ?>,
                    slideBy: 1,
                    smartSpeed: 700,
                    center: <?php echo esc_js($center_mode); ?>
                });
            });

            $('.stm_testimonials__nav-btn.prev').click(function() {
                owl.trigger('prev.owl.carousel', [300]);
            })
            $('.stm_testimonials__nav-btn.next').click(function() {
                owl.trigger('next.owl.carousel', [300]);
            })
        })(jQuery);
    </script>
<?php endif; ?>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>