<?php $headings_big = array('h1', 'h2', 'h3'); ?>

.stm-header__row_color.stm-header__row_color_top:before {
	background-color: #1a1a1a !important;
}

html body.stm_layout_church .stm-navigation__default ul li.stm_megamenu>ul.sub-menu,
html body.stm_layout_church .stm-navigation__fullwidth ul li.stm_megamenu>ul.sub-menu{
    top: 87px;
}

html body.stm_layout_church .stm-navigation__default ul li.stm_megamenu>ul.sub-menu>li,
html body.stm_layout_church .stm-navigation__fullwidth ul li.stm_megamenu>ul.sub-menu>li{
    padding: 0 30px;
}

.stm_page_bc {
    a {
        color: #808080 !important;
    }
}


@media (max-width:768px) { <?php
foreach ($headings_big as $heading) :
	echo sanitize_text_field(".{$heading}, {$heading} {");
	$settings = array_filter(pearl_get_option("{$heading}_settings", array()));
	$settings = wp_parse_args($settings, $secondary_font);

	if(!empty($settings['size'])):
		$font_size = intval($settings['size']*0.75); ?>
        font-size: <?php echo sanitize_text_field($font_size); ?>px !important;
	<?php endif; ?>
    line-height: 1.2 !important;
	<?php echo sanitize_text_field("}");
endforeach; ?>
}

.wpcf7-response-output {
    display: inline-block;
}

.stm_events_layout_4 {
    .stm_single_stm_events {
        .stm_single_event__title {
            h2 {text-transform: none !important; font-size: 42px; }
        }
    }
}


.stm_footer_layout_1 .footer-widgets .widget .widgettitle h4 {
    font-size: 14px;
    text-transform: uppercase;
    font-family: inherit;
    color: #cccccc !important;
    letter-spacing: 1.5px;
}

.stm_footer_layout_1 .footer-widgets .widget a:hover {
    color: #fff;
}

.stm_footer_layout_1 .footer-widgets .stm_wp_widget_text .textwidget {
    font-size: 14px;
    line-height: 26px;
}

.stm_footer_layout_1 .footer-widgets .stm_wp_widget_text .stm-socials a {
    border: 1px solid transparent;
    width: 50px;
    height: 50px;
    background-color: #333333;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    border-radius: 50%;
    position: relative;
    z-index: 1;
}

.stm_footer_layout_1 .footer-widgets .stm_wp_widget_text .stm-socials a:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border: 1px solid transparent;
    border-radius: 50%;
}

.stm_footer_layout_1 .footer-widgets .stm_wp_widget_text .stm-socials a:focus {
    text-decoration: none;
}

.stm_footer_layout_1 .footer-widgets .stm_wp_widget_text .stm-socials a:hover {
    text-decoration: none;
    color: #fff !important;
}

.stm_footer_layout_1 .footer-widgets .stm_wp_widget_text .stm-socials a:hover:before {
    animation: pearl_ripple_out .6s ease forwards;
}

.stm_footer_layout_1 .footer-widgets .widget_tag_cloud .tagcloud > a {
    border-radius: 3px;
    padding: 7px 12px;
    line-height: 14px;
}
