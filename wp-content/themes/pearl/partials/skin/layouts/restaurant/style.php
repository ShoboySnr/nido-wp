<?php
/*Default layout styles*/
$default = pearl_get_layout_config();

/*Colors*/
$main_color = pearl_get_option('main_color', $default['main_color']);
$secondary_color = pearl_get_option('secondary_color', $default['secondary_color']);
$third_color = pearl_get_option('third_color', $default['third_color']);

$elements_list = array(
    'colors'        => array(
        'main_color'      => array(
        ),
        'secondary_color' => array(
        ),
        'third_color'     => array(
        )
    ),
    'bg_colors'     => array(
        'main_color'      => array(
            '.stm_carousel_style_1 .owl-nav .owl-prev',
            '.stm_carousel_style_1 .owl-nav .owl-next',
        ),
        'secondary_color' => array(
        ),
        'third_color'     => array(

        )
    ),
    'border_colors' => array(
        'main_color'      => array(

        ),
        'secondary_color' => array(

        ),
        'third_color'     => array(

        ),
    )
);

foreach ($elements_list['colors'] as $color => $elements) { ?>
    <?php echo implode(',', $elements) ?> {color: <?php echo sanitize_text_field(${$color}); ?> !important}
<?php }

foreach ($elements_list['bg_colors'] as $bg_color => $elements) { ?>
    <?php echo implode(',', $elements) ?> {background-color: <?php echo sanitize_text_field(${$bg_color}); ?> !important}
<?php }

foreach ($elements_list['border_colors'] as $border_color => $elements) { ?>
    <?php echo implode(',', $elements) ?> {border-color: <?php echo sanitize_text_field(${$border_color}); ?> !important}
<?php } ?>

.stm_testimonials_style_8 .stm_testimonial__carousel .stm_testimonials__meta .stm_testimonials__avatar {
    width: 100px;
    margin: 0 0 30px;
}

.stm_pagination_style_9 .owl-controls .owl-nav .owl-prev:before,
.stm_pagination_style_9 .owl-controls .owl-nav .owl-next:before {
    color: #fff !important;
}

@media (max-width: 1023px) {
    body.stm_header_style_9 .stm-navigation.stm-navigation__default ul li.menu-item-has-children.active>a:after {
        transform: rotate(180deg) !important;
    }
    
    html body.stm_header_style_9 .stm-navigation__default ul li.stm_megamenu>ul.sub-menu>li:hover ul.sub-menu>li>a {
        color: #fff !important;
    }
}

.stm-footer {
    margin: 0 auto;
}

.stm-footer .container {
    max-width: 1125px;
}

.stm-footer .footer-widgets .widgettitle h4 {
    text-transform: none !important;
}

.stm-footer .footer-widgets .stm_wp_widget_text .textwidget {
    font-size: 14px;
    line-height: 1.9em;
}

.stm-footer .stm-footer__bottom .stm_bottom_copyright {
    font-size: 14px;
}

@media (max-width: 1023px) {
    .stm-footer .footer-widgets aside.widget.stm_wp_widget_post_gallery_style_3 {
        margin-bottom: 45px;
    }

    .stm-footer .footer-widgets aside.widget.stm_wp_widget_post_gallery_style_3 .stm_widget_media__single {
        width: 12.5%;
    }

    .stm-footer .footer-widgets aside.widget.widget_tp_widget_recent_tweets .tp_recent_tweets ul {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .stm-footer .footer-widgets aside.widget.widget_tp_widget_recent_tweets .tp_recent_tweets ul li {
        -ms-flex-preferred-size: 50%;
        flex-basis: 50%;
        padding: 0 15px;
    }
}

@media (max-width: 550px) {
    .stm-footer .footer-widgets aside.widget.stm_wp_widget_post_gallery_style_3 .stm_widget_media__single {
        width: 25%;
    }

    .stm-footer .footer-widgets aside.widget.widget_tp_widget_recent_tweets .tp_recent_tweets ul li {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
    }
}

@media (max-width: 769px) {
    .stm-footer__bottom .stm-socials__icon {
        margin-left: 0 !important;
        text-align: center;
    }
}
