<?php
    /*Fonts*/
    $fonts = pearl_get_font();

    $main_font = $fonts['main'];
    $secondary_font = $fonts['secondary'];

    /*Colors*/
    $main_color = pearl_get_option('main_color');
    $secondary_color = pearl_get_option('secondary_color');
    $third_color = pearl_get_option('third_color');
?>
.stm_layout_rental.woocommerce .widget_layered_nav ul li,
.stm_layout_rental.woocommerce .widget_product_categories ul li {
    font-family: inherit !important;
}
.stm_layout_rental.woocommerce .widget_layered_nav ul li a,
.stm_layout_rental.woocommerce .widget_product_categories ul li a {
    font-family: inherit !important;
}

.stm_layout_rental.woocommerce .widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle {
    border-radius: 50%;
}

.stm_layout_rental.woocommerce-account .stm_markup {
    padding-top: 0;
}
.stm_layout_rental.woocommerce-account .woocommerce-orders-table .woocommerce-button.view {
    text-transform: none;
    font-size: 14px;
}
.archive.stm_post_style_10 .stm_loop__list .stm_loop__single:hover a{
    color: #fff !important;
}
.archive.stm_post_style_10 .stm_loop__list .stm_loop__single .post_thumbnail{
    margin-bottom: 0;
}

.archive .stm_post_details{
    padding: 15px;
}
.archive .stm_post_details .comments_num a i{
    vertical-align: middle;
}
.archive .stm_post_details .comments_num a{
    color: #fff !important;
}
body.archive .stm_post_details>ul li{
    color: #fff;
}
.archive .stm_post_details ul li:before{
    font-size: 1.5rem;
}
.archive .stm_post_details .comments_num{
    margin: 0 0 0 auto;
}

@media(max-width: 1023px) {
    html body .stm-navigation__default ul li.stm_megamenu > ul.sub-menu > li ul.sub-menu > li:hover > a, html body .stm-navigation__fullwidth ul li.stm_megamenu > ul.sub-menu > li ul.sub-menu > li:hover > a {
        color: #fff !important;
    }
}
@media(max-width:550px) {
    .archive .stm_post_details .post_date{
        align-items: start;
    }
    .archive .stm_post_details ul li{
        margin: 0;
    }
    .archive .stm_post_details .post_date{
        height: auto;
    }
    .archive .stm_post_details .comments_num {
        margin: 5px 0 0;
    }
}


.stm-footer .footer-widgets {
    padding-top: 20px;
    padding-bottom: 24px;
}

.stm-footer .footer-widgets:before {
    content: "";
    position: absolute;
    top: -50px;
    left: 15px;
    right: 15px;
    height: 8px;
    background-color: <?php echo wp_kses_post($main_color); ?>;
}

.stm-footer .footer-widgets a {
    color: <?php echo wp_kses_post($main_color); ?>
}

.stm-footer .footer-widgets .widgettitle h4 {
    text-transform: none !important;
    margin-bottom: 22px;
    font-size: 18px;
}

.stm-footer .widget_tp_widget_recent_tweets .tp_recent_tweets ul li {
    padding-left: 27px;
    line-height: 22px;
    font-size: 14px;
    color: #a5a5a5;
}

.stm-footer .widget_tp_widget_recent_tweets .tp_recent_tweets ul li:before {
    font-size: 18px !important;
}

.stm-footer .widget_tp_widget_recent_tweets .tp_recent_tweets ul li a:hover {
    color: #ffffff !important;
}

.stm-footer .widget_tp_widget_recent_tweets .tp_recent_tweets ul li .twitter_time {
    color: #a5a5a5 !important;
    font-style: normal;
    font-size: 12px;
}

.stm-footer .stm_widget_posts.style_5 ul li .stm_widget_posts__wrapper {
    padding: 0;
}

.stm-footer .stm_widget_posts.style_5 ul li .stm_widget_posts__title {
    font-size: 16px;
    line-height: 22px !important;
}

.stm-footer .stm_widget_posts.style_5 ul li .stm_widget_posts__title:hover {
    color: #ffffff !important;
}

.stm-footer .stm_widget_posts.style_5 ul li .post-date {
    width: 100%;
    margin-bottom: 5px;
    color: #a5a5a5 !important;
}

@media (max-width: 1023px) {
    .stm-footer .stm_widget_posts.style_5 ul li .post-date {
        float: left;
        width: 100%;
    }

    .stm-footer .widget_tp_widget_recent_tweets .tp_recent_tweets ul li:last-child {
        margin-bottom: 0;
    }
}
