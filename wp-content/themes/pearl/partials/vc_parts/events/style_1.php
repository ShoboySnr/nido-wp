<?php
$id = get_the_ID();
$date_start = get_post_meta($id, 'date_start', true);
$date_start_time = get_post_meta($id, 'date_start_time', true);
$date_end_time = get_post_meta($id, 'date_end_time', true);
$address = get_post_meta($id, 'address', true);

$link = get_post_meta($id, 'link', true);
$link_text = get_post_meta($id, 'link_text', true);

$link_text = (!empty($link_text)) ? $link_text : esc_html__('View more', 'pearl');
$link_url = (!empty($link)) ? $link : get_permalink();

$date = $time = '';
$date = (!empty($date_start)) ? pearl_get_formatted_date($date_start) : '';

if(!empty($date_start_time)) $time .= pearl_get_formatted_time(strtotime($date_start_time));
if(!empty($date_end_time)) $time .= ' - ' . pearl_get_formatted_time(strtotime($date_end_time));


?>

<a href="<?php echo esc_url($link_url); ?>"
   <?php post_class('stm_event_single_list no_deco'); ?>>
    <div class="stm_event_single_list__alone hasTitle">
        <h3 class="ttc"><?php the_title(); ?></h3>
    </div>
    <?php if(!empty($date) and $time): ?>
        <div class="stm_event_single_list__alone hasDate ttc">
            <i class="__icon icon_25px mtc stmicon-date_time"></i>
            <div><?php echo esc_attr($date); ?></div>
            <div><?php echo esc_attr($time); ?></div>
        </div>
    <?php endif; ?>
    <div class="stm_event_single_list__alone hasAddress ttc">
        <i class="__icon icon_25px mtc stmicon-pin_b"></i>
        <?php echo sanitize_text_field($address); ?>
    </div>
    <div class="stm_event_single_list__alone hasButton">
        <span class="btn btn_outline btn_primary">
            <?php echo sanitize_text_field($link_text); ?>
        </span>
    </div>
</a>