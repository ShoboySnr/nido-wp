<?php
$footer_bg = pearl_get_option('footer_bg');
$footer_color = pearl_get_option('footer_color');
$main_color = pearl_get_option('main_color');
$third_color = pearl_get_option('third_color');
$top_bar_color = pearl_get_option('top_bar_text_color');
?>

.home #wrapper {
    padding-bottom: 0;
}

.stm-footer {
    padding: 0;
}

.stm-footer p {
    font-size: 14px;
}

.stm-footer .stm-footer__bottom {
    border-top: 0;
	background-color: <?php echo wp_kses_post($footer_bg); ?> !important;
}

.stm-footer .footer-widgets {
    padding: 70px 0 55px;
}

.stm-footer .footer-widgets .widget .widgettitle {
    margin-bottom: 0;
}

.stm-footer .footer-widgets .widget .widgettitle h4 {
    text-transform: none !important;
    font-size: 20px;
    font-weight: 400;
    font-family: inherit !important;
    line-height: 36px;
    margin-bottom: 15px;
}

.stm-footer .footer-widgets .stm_wp_widget_text .textwidget {
    line-height: 22px;
}

.stm-footer .footer-widgets .stm_wp_widget_text .stm-socials {
    margin: 0 -15px;
}

.stm-footer .footer-widgets .stm_wp_widget_text .stm-socials a {
    margin: 0;
    padding: 0 15px;
    font-size: 18px;
}

.stm-footer .footer-widgets .widget_contacts_style_4 .stm-icontext__address {
    margin-bottom: 27px;
}

.stm-footer .footer-widgets .widget_contacts_style_4 .widget_contacts_inner .stm-icontext_style2 .stm-icontext__text {
    font-size: 14px;
}

.stm-footer .footer-widgets .widget_contacts_style_4 .stm-icontext__phone {
    margin-bottom: 3px;
}

.stm-footer .footer-widgets .stm_custom_menu_style_3 .menu {
    margin: -5px 0 0;
}

.stm-footer .footer-widgets .stm_custom_menu_style_3 .menu li:before {
    display: none;
}

.stm-footer .footer-widgets .stm_custom_menu_style_3 .menu li a {
    font-size: 14px;
    line-height: 20px;
}

@media (max-width: 1024px) {
    .stm-footer .footer-widgets {
        padding-top: 75px;
        padding-bottom: 55px;
    }
}

@media (max-width: 550px) {
    .stm-footer .footer-widgets {
        padding-top: 55px;
        padding-bottom: 45px;
    }

    .stm-footer .footer-widgets aside.widget {
        margin-bottom: 30px;
    }

    .stm-footer .footer-widgets .widget .widgettitle {
        margin-bottom: 15px;
    }

    .stm-footer .footer-widgets .widget_contacts_style_4 .widget_contacts_inner .stm-icontext_style2.stm-icontext__fax {
        margin-bottom: 0;
    }
}

.stm-footer__bottom .stm_bottom_copyright {
    font-size: 14px;
    font-family: inherit !important;
    width: 100%;
    max-width: 100% !important;
}

.stm_products_style_2.stm_loop>div .stm_product__single a{
    border: none;
}

.stm_sidebar_style_20 .stm_custom_menu a,
.textwidget p
{
	color: rgba(<?php echo wp_kses_post(pearl_hex2rgb($footer_color, 0.5)); ?>) !important;
}

.stm_sidebar_style_20 .stm_custom_menu a:hover
{
	color: <?php echo wp_kses_post($footer_color); ?> !important;
}

.stm_form_style_4 .form-control {
	border-width: 1px !important;
}

.stm-header .stm-icontext i.stm-icontext__icon{
	color: <?php echo wp_kses_post($top_bar_color); ?> !important;
}

.single-stm_products .stm-header__row_color_center {
    color: <?php echo wp_kses_post($third_color); ?> !important;
}

ul.stm_products_categories > li > a, ul.stm_products_categories > li > i  {
    color:  <?php echo wp_kses_post($third_color); ?>!important;
}
ul.stm_products_categories > li:hover > a, ul.stm_products_categories > li:hover > i {
    color:  <?php echo wp_kses_post($main_color); ?>!important;
}

.stm_layout_furniture .stm_loop .stm_posts_list_single a {
    color: <?php echo wp_kses_post($third_color); ?>!important;
}
.stm_layout_furniture .stm_loop .stm_posts_list_single a:hover {
    color: <?php echo wp_kses_post($main_color); ?>!important;
}

.stm_header_transparent .stm-header .stm-header__row_color:last-child .stm-header__row {
    border-bottom: 1px solid rgba(255,255,255,.5);
}

.stm_mobile__header {
    background-color: <?php echo wp_kses_post($third_color); ?>;
}

@media (max-width: 1024px) {
    .stm-header.active,  .stm-header.active .stm-navigation__default ul {
        background-color: <?php echo wp_kses_post($third_color); ?>;
    }
    html body .stm-navigation__default ul li.stm_megamenu > ul.sub-menu > li ul.sub-menu > li:hover > a {
        background-color: <?php echo wp_kses_post($main_color); ?> !important;
        color: #fff !important;
    }
}
