<?php
$element = 'stm_infobox_' . $style;

$classes = array('stm_infobox', $element);
$custom_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, '' ) );
$classes[] = ' ' . $custom_class;

/*Default layout styles*/
$default = pearl_get_layout_config();
/*Colors*/

$m_color = pearl_get_option('main_color', $default['main_color']);


$inline_styles = "";
$inline_styles .= ".{$custom_class} { background-color: {$bg_color} !important; }";
$inline_styles .= ".{$custom_class}:hover { background-color: {$bg_color_hover} !important; }";
$inline_styles .= ".{$custom_class} .btn { background-color: {$button_bg_color} !important; color: {$button_text_color} !important; }";
$inline_styles .= ".{$custom_class} .btn:hover { background-color: {$button_bg_color_hover} !important; color: {$button_text_color_hover} !important; }";

pearl_add_element_style('infobox', $style, $inline_styles);

$image_size = (empty($image_size)) ? '500x335' : $image_size;
$image = pearl_get_VC_img($image, $image_size);

$classes[] = " img_align_" . $image_pos;
?>

<div  class="<?php echo esc_attr(implode(' ', $classes)) ?>">
    <div class="stm_infobox__image">
        <?php echo wp_kses_post($image); ?>
        <?php if ($label && $label != ''): ?>
            <span class="stm_infobox__label"><?php echo esc_html($label); ?></span>
        <?php endif; ?>
    </div>
    <div class="stm_infobox__content">
        <?php echo wpb_js_remove_wpautop($content, true);
        if(!empty($url)): ?>
            <a href="<?php echo esc_url($url); ?>"
                class="btn btn_default btn_secondary"
                title="<?php if(!empty($link_title)): ?><?php echo esc_attr($link_title); ?><?php else : ?><?php esc_html_e('Shop now', 'pearl'); ?><?php endif; ?>">
                <?php if(!empty($link_title)): ?><?php echo sanitize_text_field($link_title); ?><?php else : ?><?php esc_html_e('Shop now', 'pearl'); ?><?php endif; ?>
            </a>
        <?php endif; ?>
    </div>
</div>