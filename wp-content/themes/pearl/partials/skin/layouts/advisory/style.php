<?php
/*Colors*/
$main_color = pearl_get_option('main_color', $default['main_color']);
$secondary_color = pearl_get_option('secondary_color', $default['secondary_color']);
$third_color = pearl_get_option('third_color', $default['third_color']);
$body_font_data = pearl_get_option('body_font');
$footer_color = pearl_get_option('footer_color');
$top_bar_color = pearl_get_option('top_bar_text_color');
?>

.home #wrapper {
    padding-bottom: 0;
}

.stm_footer_layout_1 .stm-footer {
    padding: 0;
}

.stm_footer_layout_1 .stm-footer p {
    font-size: 14px;
}

.stm_footer_layout_1 .stm-footer__bottom {
    border-top: 0;
}

.stm_footer_layout_1 .stm-footer .footer-widgets {
    padding: 63px 0 15px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget {
    margin-bottom: 0;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget .widgettitle {
    margin-bottom: 25px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget .widgettitle h4 {
    text-transform: none !important;
    font-size: 20px;
    font-weight: 400;
    font-family: inherit !important;
    line-height: 36px;
    margin-bottom: 15px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget p {
    margin-bottom: 25px;
    position: relative;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget_mc4wp_form_widget input[type=email] {
    background-color: rgba(255, 255, 255, 0.1);
    border-color: #fff;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget_mc4wp_form_widget input[type=email]:-ms-input-placeholder {
    color: #fff !important;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget_mc4wp_form_widget input[type=email]::placeholder {
    color: #fff !important;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget_nav_menu ul > li > a:before {
    content: '●';
    margin-right: 10px;
    font-size: 10px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .stm_wp_widget_text .textwidget {
    line-height: 22px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .stm_wp_widget_text .stm-socials {
    margin: 0 -15px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .stm_wp_widget_text .stm-socials a {
    margin: 0;
    padding: 0 15px;
    font-size: 18px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget_contacts_style_4 .stm-icontext__address {
    margin-bottom: 27px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget_contacts_style_4 .widget_contacts_inner .stm-icontext_style2 .stm-icontext__text {
    font-size: 14px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .widget_contacts_style_4 .stm-icontext__phone {
    margin-bottom: 3px;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .stm_custom_menu_style_3 .menu {
    margin: -5px 0 0;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .stm_custom_menu_style_3 .menu li:before {
    display: none;
}

.stm_footer_layout_1 .stm-footer .footer-widgets .stm_custom_menu_style_3 .menu li a {
    font-size: 14px;
    line-height: 20px;
}

@media (max-width: 1024px) {
    .stm_footer_layout_1 .stm-footer .footer-widgets {
        padding-top: 75px;
        padding-bottom: 55px;
    }
}

@media (max-width: 550px) {
    .stm_footer_layout_1 .stm-footer .footer-widgets {
        padding-top: 55px;
        padding-bottom: 45px;
    }

    .stm_footer_layout_1 .stm-footer .footer-widgets aside.widget {
        margin-bottom: 30px;
    }

    .stm_footer_layout_1 .stm-footer .footer-widgets .widget .widgettitle {
        margin-bottom: 15px;
    }

    .stm_footer_layout_1 .stm-footer .footer-widgets .widget_contacts_style_4 .widget_contacts_inner .stm-icontext_style2.stm-icontext__fax {
        margin-bottom: 0;
    }
}

.stm_footer_layout_1 .stm-footer .stm-socials .stm-socials__icon {
    background-color: <?php echo wp_kses_post($main_color) ?>;
}
.stm_footer_layout_1 .stm-footer .stm-socials .stm-socials__icon:hover {
    background-color: #fff !important;
}

.stm_footer_layout_1 .stm-footer__bottom {
    border-top: 1px solid #fff;
    padding: 40px 0;
}

.stm_footer_layout_1 .stm-footer__bottom .stm_bottom_copyright {
    font-size: 14px;
    font-family: inherit !important;
}

.stm_header_style_1 .stm-navigation__default>ul>li ul li>a {
	font-size: 14px !important;
}


#stm_newsletter_submit{
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
}

.stm_posts_carousel_style_6 .owl-dots .owl-dot.active{
    background-color: transparent !important;
}

.stm_buttons_style_21 .btn.btn_solid:hover{
    color: #fff !important;
}

html body .stm-navigation__default ul li.stm_megamenu > ul.sub-menu > li, html body .stm-navigation__fullwidth ul li.stm_megamenu > ul.sub-menu > li {
	padding: 0 20px;
}

html body .stm-navigation__default ul li.stm_megamenu > ul.sub-menu > li ul.sub-menu > li:hover > a, html body .stm-navigation__fullwidth ul li.stm_megamenu > ul.sub-menu > li ul.sub-menu > li:hover > a {
	color: <?php echo wp_kses_post($main_color); ?> !important;
}

.stm_layout_advisory .stm_iconbox_style_1.stm_flipbox .stm_flipbox__front .inner, .stm_iconbox_style_1.stm_flipbox .stm_flipbox__back .inner {
    padding: 30px 20px;
}
<?php
$infobox_first_gradient = 'rgba('. pearl_hex2rgb($secondary_color, .5) .')';
$gradient = '0deg, ' . $infobox_first_gradient . ' 0%, rgba(219,255,255,.5) 100%';
?>
.stm_infobox_style_7 .stm_infobox__image:after {
    background-image: -moz-linear-gradient(<?php echo wp_kses_post($gradient); ?>);
    background-image: -webkit-linear-gradient(<?php echo wp_kses_post($gradient); ?>);
    background-image: -ms-linear-gradient(<?php echo wp_kses_post($gradient); ?>);
}
.stm_services_style_11 .stm_service__overlay {
    background-image: -moz-linear-gradient(<?php echo wp_kses_post($gradient); ?>);
    background-image: -webkit-linear-gradient(<?php echo wp_kses_post($gradient); ?>);
    background-image: -ms-linear-gradient(<?php echo wp_kses_post($gradient); ?>);
}

.stm_sidebar_style_21 .widget_nav_menu a,
.stm_sidebar_style_21 .textwidget p,
.widget_mc4wp_form_widget p
{
    color: rgba(<?php echo wp_kses_post(pearl_hex2rgb($footer_color, 0.5)); ?>) !important;
}

.stm_sidebar_style_21 .widget_nav_menu a:hover {
    color: <?php echo wp_kses_post($footer_color); ?> !important;
}
.stm-header .stm-icontext i.stm-icontext__icon{
    color: <?php echo wp_kses_post($top_bar_color); ?> !important;
}

.stm-header .stm-header__element_icon_only .stm-socials a {
    margin: 0;
    padding: 0 15px;
}

.stm-header .stm-header__element_icon_only .stm-socials {
    margin: 0 -15px;
}
.stm_header_style_1 .stm-navigation__default>ul>li ul li:hover>a  {
    color:#fff !important;
}


@media (max-width: 1023px) {
    .stm_layout_advisory.stm_header_style_1 .stm_titlebox {
        margin-top: 0;
    }
    [class*='stm-header__row_color'] {
        color: <?php echo wp_kses_post($third_color); ?>;
    }
    .stm_layout_advisory .stm-header {
        background-color: #fff !important;
        color: <?php echo wp_kses_post($third_color); ?>;
    }
    .stm_layout_advisory .stm_mobile__header {
        background-color: #fff !important;
        margin-bottom: 0 !important;
    }
    .stm_layout_advisory.stm_header_style_1 .stm-navigation.stm-navigation__default ul li ul.sub-menu li a {
        color: inherit !important;
    }

    html body .stm-navigation__default ul li.stm_megamenu .sub-menu li ul.sub-menu > li .stm_mega_textarea {
        color: inherit !important;
    }
}

.stm_layout_advisory .stm-navigation__default>ul>li ul:after {
    top: -25px;
    height: 25px;
}

.stm_layout_advisory .booked-list-view.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button:not(:hover) span {
    color: <?php echo wp_kses_post($third_color); ?>;
}

.stm_carousel_dots_bottom .owl-controls .owl-dots {
    margin-top: 20px;
}
.stm_carousel_dots_bottom .owl-controls .owl-dots .owl-dot.active {
    background-color: transparent !important;
}
.stm_carousel_dots_bottom .owl-controls .owl-dots .owl-dot span {
    background-color: <?php echo wp_kses_post($third_color); ?> !important;
}
.stm_carousel_dots_bottom .owl-controls .owl-dots .owl-dot.active span {
    background-color: <?php echo wp_kses_post($main_color); ?> !important;
}