<?php
$logo = intval(pearl_get_option('logo'));

$wrapper_classes = array('stm_mobile__header');

if (!empty($logo)) {
	$logo = pearl_get_image_url($logo);
}


?>

<div class="stm-header__overlay"></div>

<div class="<?php echo esc_attr(implode(' ', $wrapper_classes)) ?>">
    <div class="container">
        <div class="stm_flex stm_flex_center stm_flex_last stm_flex_nowrap">
            <?php if (!empty($logo)): ?>
                <div class="stm_mobile__logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php esc_attr_e('Home', 'pearl'); ?>">
                        <img src="<?php echo esc_url($logo); ?>"
                             alt="<?php esc_html_e('Site Logo', 'pearl'); ?>"/>
                    </a>
                </div>
            <?php endif; ?>
            <div class="stm_mobile__switcher stm_flex_last js_trigger__click"
                 data-element=".stm-header, .stm-header__overlay"
                 data-toggle="false">
                <span class="mbc"></span>
                <span class="mbc"></span>
                <span class="mbc"></span>
            </div>
        </div>
    </div>
</div>