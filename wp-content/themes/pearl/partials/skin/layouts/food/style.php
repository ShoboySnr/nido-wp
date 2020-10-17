<?php
/* Colors */
$main_color=pearl_get_option('main_color');
$secondary_color=pearl_get_option('secondary_color');
$third_color=pearl_get_option('third_color');

/* Fonts */
$fonts=pearl_get_font();
$main_font=$fonts['main']['name'];
$secondary_font=$fonts['secondary']['name'];

?>
<style>
*{}

/* colors */

/* first color */
.rpress-checkout-button-actions .button.rpress_checkout_register_login.rpress-submit,
.stm-header .stm-icontext .stm-icontext__icon,
.rpress_purchase_submit_wrapper .rpress-add-to-cart,
.rpress-cart .rpress_checkout a,
#rpressModal .modal-body .rpress-tabs-wrapper .nav-pills .nav-item.active a,
form#rpress_purchase_form #rpress-purchase-button,
#rpressModal .modal-content .btn.btn-block.btn-primary,
#rpressModal .submit-fooditem-button,
.stm_layout_food .stm_pricing-table_style_6 .stm_pricing-table__footer .btn,
.stm_layout_food .stm_pricing-table_style_8 .stm_pricing-table__footer .btn {
    background-color: <?php echo esc_attr($main_color) ?> !important;
}
.rpress_form .rpress-gateway-option .stm_input_wrapper_radio.active:before,
ul.rpress-category-lists .rpress-category-item a.active,
ul.rpress-category-lists .rpress-category-item a:hover {
    border-color: <?php echo esc_attr($main_color) ?> !important;
}

/* second color */
.rpress-checkout-button-actions .button.rpress_checkout_register_login.rpress-submit:hover,
.rpress_purchase_submit_wrapper .rpress-add-to-cart:hover,
.rpress-cart .rpress_checkout a:hover,
#rpressModal .modal-content .modal-header button.close:hover,
form#rpress_purchase_form #rpress-purchase-button:hover,
#rpressModal .modal-content .btn.btn-block.btn-primary:hover,
#rpressModal .submit-fooditem-button:hover,
#rpressModal .rpress-popup-actions .btn-count button:hover,
.stm_pricing-table_style_6 .stm_pricing-table__footer .btn:hover,
.stm_pricing-table_style_8 .stm_pricing-table__footer .btn:hover,
.rpress_form .rpress-gateway-option .stm_input_wrapper_radio.active:before {
    background-color: <?php echo esc_attr($secondary_color) ?> !important;
}
.stm_post_type_list_style_1 .stm_post_type_list__terms,
.stm-header .stm-icontext .stm-icontext__icon,
.stm-counter_style_16 .stm-counter__icon,
.mc4wp_food_form_btn,
.rpress-cart .rpress_checkout a,
.rpress-remove-from-cart,
.rpress_fooditem_inner .rpress_fooditem_excerpt p,
.rpress_purchase_submit_wrapper .rpress-add-to-cart,
ul.rpress-category-lists .rpress-category-item a.active,
ul.rpress-category-lists .rpress-category-item a:hover,
#rpressModal .modal-body .rpress-tabs-wrapper ul#rpressdeliveryTab,
form#rpress_purchase_form #rpress-purchase-button,
#rpressModal .modal-content .btn.btn-block.btn-primary,
#rpressModal .submit-fooditem-button,
div.rpress-popup-actions .btn-count input[type="button"],
.stm_gmap_wrapper.style_2 .gmap_addresses .title,
.stm_gmap_wrapper.style_2 .gmap_addresses .owl-item .item ul li,
.stm_gmap_wrapper.style_2 .gmap_addresses a,
.stm_layout_food .stm_gmap_wrapper.style_2 .gmap_addresses .owl-item .item ul li .icon i:before {
    color: <?php echo esc_attr($secondary_color) ?> !important;
}

.rpress_form .rpress-gateway-option .stm_input_wrapper_radio:before {
    border-color: <?php echo esc_attr($secondary_color) ?> !important;
}

/* third color */
ul.rpress-category-lists,
#rpressModal .modal-content .modal-header button.close,
#rpressModal .modal-body .rpress-tabs-wrapper ul#rpressdeliveryTab,
div.rpress-popup-actions .btn-count input[type="button"] {
    background-color: #eff4fa !important;
}
form#rpress_purchase_form #rpress-purchase-button:hover,
#rpressModal .modal-content .btn.btn-block.btn-primary:hover,
div.rpress-popup-actions .btn-count input[type="button"]:hover,
#rpressModal .submit-fooditem-button:hover {
    color: #eff4fa !important;
}

/* colors */

/* fonts */

.rpress-title-holder .price {
    font-family: <?php echo esc_attr($main_font) ?>;
}

.rpress-page fieldset legend,
.rpress_form #rpress_final_total_wrap {
    font-family: <?php echo esc_attr($secondary_font) ?>;
}
/* fonts */


.overflow-hidden {
    overflow: hidden;
}
.no-zindex {
    z-index: inherit !important;
}

body.stm_transparent_header_disabled.stm_title_box_disabled.stm_breadcrumbs_enabled .stm-header {
    margin-bottom: 50px;
}
.stm-header__row_color:before {
    border-bottom: 1px solid #eff4fa;
}
.home .stm-header__row_color:before {
    border: none;
}

.home .stm-header__row_color_center {
    padding-top: 54px;
}
body.stm_title_box_enabled:not(.stm_header_offset) .stm_mobile__header {
    margin-bottom: 0;
}
.stm-header .stm-icontext {
    display: flex;
    align-items: center;
    white-space: nowrap;
}
.stm-header .stm-icontext .stm-icontext__icon {
    float: left;
    margin-right: 10px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.stm-header .stm-icontext .stm-icontext__text span {
    display: block;
}
.stm-header .stm-icontext .stm-icontext__text .phone_number {
    font-weight: 700;
}

.stm-navigation__default > ul > li {
    text-transform: none;
}
.stm-navigation__line_bottom > ul > li.current-menu-item:before {
    opacity: 1;
    visibility: visible;
    bottom: -10px;
}

/* titlebox */
.stm_titlebox {
    padding: 56px 0 !important;
    margin-bottom: 100px !important;
    min-height: 0 !important;
}
.stm_titlebox_text-center .stm_separator {
    display: none;
}
.stm_titlebox_style_13 .stm_titlebox__categories {
    justify-content: center;
}
.stm_titlebox_style_13.stm_titlebox .stm_breadcrumbs {
    text-transform: none;
    font-weight: 400;
    color: <?php echo esc_attr($secondary_color) ?> !important;
}
.stm_titlebox_style_13.stm_titlebox .stm_breadcrumbs span[property="name"] {
    text-transform: none;
}


.stm_page_bc {
    display: none !important;
}
/* titlebox */



/* INSTAGRAM */
#sb_instagram {
    padding: 0 !important;
}
#sb_instagram .sbi_photo {
    position: relative;
    opacity: 1 !important;
    overflow: hidden;
}
#sb_instagram .sbi_photo:before {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    content: 'View in Instagram';
    text-transform: uppercase;
    display: block;
    opacity: 0;
    background-color: rgba(0,0,0,.5) ;
    transition: opacity .2s;
    font-size: 12px;
    font-weight: 700;
    line-height: 16px;
    color: #fff;
    padding-top: 55%;
    text-align: center;
}
#sb_instagram .sbi_photo:after {
    opacity: 0;
    content: '\f16d';
    font-family: 'FontAwesome';
    font-size: 34px;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    left: 50%;
    top: 45%;
    transform: translate(-50%, -50%);
    transition: opacity .2s;
}
#sb_instagram .sbi_photo:hover:before,
#sb_instagram .sbi_photo:hover:after {
    opacity: 1;
}
@media (max-width: 480px) {
    #sb_instagram.sbi_col_10 #sbi_images .sbi_item,
    #sb_instagram.sbi_col_3 #sbi_images .sbi_item, 
    #sb_instagram.sbi_col_4 #sbi_images .sbi_item, 
    #sb_instagram.sbi_col_5 #sbi_images .sbi_item, 
    #sb_instagram.sbi_col_6 #sbi_images .sbi_item, 
    #sb_instagram.sbi_col_7 #sbi_images .sbi_item, 
    #sb_instagram.sbi_col_8 #sbi_images .sbi_item, 
    #sb_instagram.sbi_col_9 #sbi_images .sbi_item {
        width: 50%;
    }
}
/* INSTAGRAM */


.mc4wp_food_form {
    max-width: 500px;
    margin: 0 auto;
    display: flex;

}
.mc4wp_food_form_input {
    text-transform: none !important;
    font-weight: 400 !important;
    letter-spacing: 0 !important;
}
input[type="submit"].mc4wp_food_form_btn {
    margin-left: 8px;
    padding: 0 40px;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    border-radius: 30px;
}
input[type="submit"].mc4wp_food_form_btn:hover {
    color: #fff !important;
}


.stm-footer .footer-widgets aside.widget {
    margin: 0;
}
.stm_footer_layout_4 #menu-footer-menu {
    display: flex;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    text-transform: lowercase;
    flex-wrap: wrap;
}
#menu-footer-menu li {
    margin: 0 20px 10px;
}
body.stm_footer_layout_4 .stm-footer {
    border: none;
    padding: 45px 0 !important;
}

body.stm_footer_layout_4 .stm-footer__bottom .stm_markup {
    flex-direction: column-reverse;
}
body.stm_footer_layout_4 .stm-footer .stm-socials {
    margin-top: 30px;
    margin-bottom: 0;
}
body.stm_footer_layout_4 .stm-footer .stm-socials a {
    width: auto;
    height: auto;
    line-height: initial;
    background-color: transparent !important;
}
body.stm_footer_layout_4 .stm-footer .stm-socials a + a {
    margin-left: 20px;
}
body.stm_footer_layout_4 .stm-footer .stm-socials a:hover i {
    color: <?php echo esc_attr($main_color) ?> !important;
}
body.stm_footer_layout_4 .stm-footer .stm-footer__bottom {
    padding: 30px 0 0;
    border-top: 1px solid #ddd;
}
body.stm_footer_layout_4 .stm-footer .stm-footer__bottom .stm_bottom_copyright {
    font-size: 14px;
    opacity: .5;
}



.stm_pricing-table_style_9,
.stm_pricing-table_style_9 .stm_pricing-table__head h5 {
    color: #fff;
}

.stm_staff_grid_style_3 .btn {
    height: auto;
}

.stm_Layout_food .stm-navigation__fwsb ul li a {
    font-weight: 500 !important;
}


.stm_mobile__header {
    padding: 30px 0;
}

.stm_layout_food .stm_video.stm_video_style_2 .stm_playb:after {
    border-width: 8px;
    width: 125px;
    height: 125px;
}

.stm_layout_food .stm_widget_search.style_1 .widget.widget_search .search-form .form-control {
    border-radius: 30px;
    border-color: #ddd;
}
.stm_layout_food .stm_widget_search.style_1 .widget.widget_search .search-form button {
    width: 50px;
}

.stm_layout_food .stm_project_details_style_4 .stm_project_details__label,
.stm_layout_food .stm_markup__sidebar .widget .widgettitle {
    text-transform: capitalize;
}
.btn.btn_solid.btn_icon.btn_icon-right {
    padding-right: 40px !important;
}
.btn.btn_solid.btn_icon.btn_icon-left {
    padding-left: 40px !important;
}

.stm_layout_food .stm_pricing-table_style_8 .stm_pricing-table__content ul {
    margin: 0;
}

.stm_single_stm_events .stm_markup__content .stm_single_event__title {
    font-size: 36px;
}

body .btn.btn_icon-right .btn__icon {
    right: 0;
}

#rpressModal .modal-content .modal-header button.close {
    outline: none;
}

.stm_layout_food .stm_mobile__switcher {
    z-index: 10;
}

@media (max-width: 1024px) {
    .stm-footer .footer-widgets aside.widget {
        width: 100% !important;
    }

    h2, .h2 {
        font-size: 40px;
    }
    .stm_titlebox {
        margin-bottom: 50px !important;
    }
    .stm_layout_food .stm_titlebox_style_13 .stm_titlebox__title {
        font-size: 40px;
    }
    .wpb-js-composer .vc_tta.vc_general .vc_tta-panel-title>a {
        font-size:
    }
}

@media (max-width: 1023px) {
    .stm_mobile__header {
        padding-bottom: 30px !important;
        margin-bottom: 30px;
        border-bottom: 1px solid #ddd;
    }
}
@media (max-width: 767px) {
    h4, .h4 {
        font-size: 18px;
    }
}


</style>