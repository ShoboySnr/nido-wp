<?php
/* Colors */
$main_color=pearl_get_option('main_color');
$secondary_color=pearl_get_option('secondary_color');
$third_color=pearl_get_option('third_color');

/* Fonts */
$fonts=pearl_get_font();
$main_font=$fonts['main'];
$secondary_font=$fonts['secondary'];

?>
<style>
* {}

.stm-counter_style_15 .stm-counter__label,
p {
    <?php if( !empty($main_font['name'])): ?> 
    font-family: <?php echo esc_attr($main_font['name']);?>;
    <?php endif;?>
}
/* font: main */


/* font: secondary */
.stm-counter_style_15 {
    <?php if( !empty($main_font['name'])): ?> 
    font-family: <?php echo esc_attr($secondary_font['name']);?>;
    <?php endif;?>
}
/* font: secondary */


/* text-color: main-color */
.stm_single_post_style_2 .stm_post__tags a,
.stm_schedule_style_1 .event_lesson_tabs a dfn,
.stm_single_event__categories a,
.stm_projects_carousel.stm_projects_carousel_dark .stm_projects_carousel__tabs .stm_projects_carousel__tab a:hover,
.stm_projects_carousel.stm_projects_carousel_dark .stm_projects_carousel__tabs .stm_projects_carousel__tab a.active,
.stm_lists_style_1 .wpb_text_column ul li strong,
.stm_single_post_style_1 .stm_post_panel .stm_single_post__tags a,
.stm_vacancies_style_2 .stm_vacancies__single:hover .inner,
.services_price_list_style_1 .services_pills_container > ul > li:hover,
.services_price_list_style_1 .service__name a,
.services_price_list_style_2 .service__name a,
.services_price_list_style_2 .service__cost,
.services_price_list_style_3 .service__name a,
.stm_layout_spa .stm_pricing-table_style_8 .stm_pricing-table__footer .btn:hover,
.stm_pricing-table_style_1 .stm_pricing-table__pricing,
.stm_pricing-table_style_2 .stm_pricing-table__prefix,
.stm_pricing-table_style_2 .stm_pricing-table__price, 
.stm_pricing-table_style_2 .stm_pricing-table__separator,
.stm_pricing-table_style_4 .stm_pricing-table__pricing,
.stm_pricing-table_style_5 .stm_pricing-table__pricing,
.stm_pricing-table_style_6 .stm_pricing-table__footer .btn,
.stm_pricing-table_style_8 .stm_pricing-table__pricing,
.stm_pricing-table_style_8 .stm_pricing-table__footer .btn,
.stm_lists_style_1 .wpb_text_column ul.main_font li strong,
.stm_projects_grid_style_5 .btn.btn_outline.btn_primary.btn_load span,
.stm_posttimeline_style_1 .stm_posttimeline__heading h4,
.stm_projects_carousel__tabs .stm_projects_carousel__tab a.active,
.stm_projects_carousel__tabs .stm_projects_carousel__tab a:hover,
.btn_primary.btn_solid:hover,
.stm_post_type_list_style_3 .stm_post_type_list__content h4,
.stm_services_text_carousel_style_1 .stm_services_carousel .item .content h5 a:hover,
.stm_buttons_style_24 .btn,
.stm_layout_spa .stm_iconbox_style_2 .stm_iconbox__text h5,
.stm_donation_style_1 .btn:hover,
.stm_donation_style_2 .btn:hover,
.open-table-widget .btn-primary:hover, 
.open-table-widget .btn-primary:focus, 
.open-table-widget .btn-primary:active, 
.open-table-widget .btn-primary.active, 
.open-table-widget .open .dropdown-toggle.btn-primary, 
.open-table-widget input.otw-submit-btn:hover, 
.open-table-widget input.otw-submit-btn:focus,
.stm_open_table_style_3 .otw-input-wrap label:before,
.stm_posts_list_style_24 .stm_posts_list_single:hover .stm_posts_list_single__body h5,
.stm_layout_spa .stm_posts_list_style_24 .stm_posts_list_single__date,
.stm_pricing-table_style_12 .stm_pricing-table__head h5,
.stm_pricing-table_style_12 .stm_pricing-table__footer .btn,
.stm_footer_layout_4 .stm-footer .stm-socials a i,
.stm_testimonials_style_27 .stm_testimonials__info span,
.stm_layout_spa .stm_services_text_carousel_style_5 .owl-nav .owl-prev:hover, 
.stm_layout_spa .stm_services_text_carousel_style_5 .owl-nav .owl-next:hover {
    color: <?php echo esc_attr($main_color) ?> !important;
}
/* text-color: main-color */

/* text-color: secondary-color */
.stm_post_style_1 ul.comment-list .comment .comment-author a,
.vc_tta.vc_tta-accordion .vc_tta-panels-container .vc_tta-panels .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title > a,
.stm_projects_carousel__tab a,
.stm_post_details ul li,
.stm_post_details ul li > div,
.stm_post_details .comments_num a,
.stm_vacancies_style_1 > a,
.stm_testimonials_style_7 .stm_testimonials__review,
.stm_testimonials_style_10 .stm_testimonials__review,
.stm_stories_list_style_1 .stm_loop__story_1 .stm_story_intro,
.stm_projects_grid_style_2 .stm_projects__meta .inner h5,
.stm_posttimeline_style_2 .stm_posttimeline__post_title,
.stm_posttimeline_style_2 .stm_posttimeline__post_excerpt,
.stm_posttimeline_style_1 .stm_posttimeline__post p,
.stm_partners_style_2 .stm_partners__title,
.stm_partners_style_2 .stm_partners__description,
.stm_widget_posts.style_2 > ul li .stm_widget_posts__title,
.stm_post_type_list_style_1 .stm_post_type_list__content h4,
.stm_post_type_list_style_2 .stm_post_type_list__content h4,
.stm_services_style_7 .stm_loop__grid > a.tbc,
.stm_services_style_7 .stm_loop__grid > a.tbc h5,
.stm_services_style_7 .stm_loop__grid > a.tbc_h:hover,
.stm_services_style_7 .stm_loop__grid > a.tbc_h:hover h5,
.stm_services_style_6 .stm_loop__single_style6 .inner .inner_info,
.stm_services_style_6 .stm_loop__single_style6 .inner .inner_info h5,
.stm_services_style_5 .stm_post_type_list__content h4,
.stm_services_style_2 .stm_services__title .h6,
.stm_services_style_1 .stm_loop__single,
.stm_services_text_carousel_style_1 .stm_services_carousel .item .content h5 a,
.stm_events_list_style_1 .stm_event_single_list > div,
.stm_events_list_style_1 .stm_event_single_list > div.hasTitle h3,
.stm_opening_hours_table_style_1 .day .lunch_time {
    color: <?php echo esc_attr($secondary_color) ?> !important;
}
/* text-color: secondary-color */

/* text-color: third-color */
.stm_projects_carousel.stm_projects_carousel_dark .stm_projects_carousel__tabs .stm_projects_carousel__tab a,
.stm_pricing-table_style_9,
.stm_pricing-table_style_5 .stm_pricing-table__footer .btn:hover,
.stm_services_style_7 .stm_loop__grid a.mbc,
.stm_services_style_7 .stm_loop__grid a.mbc h5,
.stm_services_style_7 .stm_loop__grid a.mbc_h:hover,
.stm_services_style_7 .stm_loop__grid a.mbc_h:hover h5,
.stm_services_style_7 .stm_loop__grid a.sbc,
.stm_services_style_7 .stm_loop__grid a.sbc h5,
.stm_services_style_7 .stm_loop__grid a.sbc_h:hover,
.stm_services_style_7 .stm_loop__grid a.sbc_h:hover h5,
.stm_services_style_2 .stm_loop__single:hover .stm_services__title .h6 {
    color: <?php echo esc_attr($third_color) ?> !important;
}
/* text-color: third-color */

/* background-color: main-color */
.open-table-widget input.otw-submit-btn,
.stm_pricing-table_style_6 .stm_pricing-table__footer .btn:hover,
.stm_pricing-table_style_7 .stm_pricing-table__pricing:after,
.stm_layout_spa .stm_pricing-table_style_12 .stm_pricing-table__footer .btn:hover,
.stm_iconbox_style_16 .stm_iconbox__icon {
    background-color: <?php echo esc_attr($main_color) ?> !important;
}
/* background-color: main-color */
/* background-color: secondary-color */
.stm_layout_spa .services_price_list_style_1 .services_pills_container > ul > li:not(.active) a:hover,
.stm_gmap_wrapper.style_1 .gmap_addresses:before {
    background-color: <?php echo esc_attr($secondary_color) ?> !important;
}
/* background-color: secondary-color */
/* background-color: third-color */
.open-table-widget input.otw-submit-btn:hover, 
.open-table-widget input.otw-submit-btn:focus,
.stm_pricing-table_style_8 .stm_pricing-table__footer .btn:hover,
.stm_footer_layout_4 .stm-footer .stm-socials a,
.stm_staff_list_style_6 {
    background-color: <?php echo esc_attr($third_color) ?> !important;
}
@media (max-width: 1024px) {
    .section.vc_section-has-fill {
        background-color: <?php echo esc_attr($third_color) ?> !important;
        background-image: none !important;
    }
}
/* background-color: third-color */



.open-table-widget input.otw-submit-btn, 
.open-table-widget input.otw-submit-btn:hover, 
.open-table-widget input.otw-submit-btn:focus {
    border: 2px solid <?php echo esc_attr($main_color) ?> !important;
}


/* header */
.stm_header_style_1 .stm-header {
    margin-bottom: 30px;
}
.stm_header_style_1 .stm_mobile__logo {
    min-width: 0 !important;
}
.stm-navigation__default > ul > li {
    text-transform: uppercase;
}
.stm_header_style_1 .stm-navigation > ul > li:before {
    width: 3px;
    left: 50% !important;
    margin-left: -2px;
    right: auto;
}
html body .stm-navigation__default ul li.stm_megamenu > ul.sub-menu, html body .stm-navigation__fullwidth ul li.stm_megamenu > ul.sub-menu {
    top: 55px;
}
@media (max-width: 1023px) {
    
    .stm_layout_spa.stm_header_style_1 .stm-header__element {
        margin: 0 !important;
    }
    .stm_layout_spa.stm_header_style_1 .stm-navigation.stm-navigation__default ul li ul.sub-menu li a {
        color: <?php echo esc_attr($secondary_color) ?> !important;
    }
}
@media (min-width: 1024px) {
    html body .stm-navigation__default ul li.stm_megamenu > ul.sub-menu > li.menu-item-has-children a, 
    html body .stm-navigation__fullwidth ul li.stm_megamenu > ul.sub-menu > li.menu-item-has-children a {
        padding: 0 0 15px !important;
    }
}
/* header */

.vc_section.vc_section-has-fill {
    background-position: center !important;
}

/* pricing */
.stm_layout_spa .stm_pricing-table_style_12 .stm_pricing-table__separator,
.stm_layout_spa .stm_pricing-table_style_12 .stm_pricing-table__postfix {
    font-weight: 400;
    margin-left: 5px;
}
.stm_layout_spa .stm_pricing-table_style_12 .stm_pricing-table__head h5 {
    font-size: 16px;
    line-height: 19px;
    font-weight: 400;
}

.stm_pricing-table_style_9,
.stm_pricing-table_style_9 .stm_pricing-table__list,
.stm_pricing-table_style_9 .stm_pricing-table__head h5,
.stm_pricing-table_style_9 .stm_pricing-table__pricing {
    color: #fff !important;
}
.stm_layout_spa .stm_pricing-table_style_5 .stm_pricing-table__footer .btn {
    padding-top: 10px;
    padding-bottom: 10px;
    line-height: 28px;
}
/* pricing */

/* carousel */
.stm_layout_spa .stm_carousel_style_1 .stm_carousel__big {
    position: relative;
    margin-bottom: 10px;
}
.stm_layout_spa .stm_carousel_style_1 .stm_carousel__single_big img,
.stm_layout_spa .stm_carousel_style_1 .stm_carousel__single_small img,
.stm_layout_spa .stm_carousel_style_1 .stm_carousel__single_small:before {
    border-radius: 10px;
}
.stm_layout_spa .stm_carousel_style_1 .stm_carousel__single_small.current:before {
    border: 2px solid <?php echo esc_attr($main_color) ?>;
    background: none;
}
/* carousel */

/* iconbox */
@media (max-width: 767px) {
    .stm_layout_spa .stm-counter_style_15 {
        justify-content: center;
    }
}
/* iconbox */


/* INSTAGRAM */
#sb_instagram {
    padding: 0 !important;
}
#sb_instagram .sbi_photo {
    position: relative;
    opacity: 1 !important;
    border-radius: 10px;
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
    padding-top: 60%;
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
        width: 100%;
    }
}
/* INSTAGRAM */

/* partners */
@media (max-width: 550px) {
    .stm_layout_spa .stm_partners_style_3 .stm_partners__single {
        flex: 0 1 50%;
    }
}
/* partners */


/* footer */
.stm_layout_spa.stm_footer_layout_4 .stm-footer {
    border-color: rgba(0, 0, 0, .05);
    padding-bottom: 30px !important;
}

.stm_layout_spa.stm_footer_layout_4 .stm-footer .footer-widgets {
    padding-bottom: 30px;
    padding-top: 0;
}
.stm_layout_spa.stm_footer_layout_4 .stm-footer .widget_nav_menu {
    margin: 0;
    font-size: 12px;
}
.stm_layout_spa.stm_footer_layout_4 .stm-footer .widget_nav_menu .menu {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    text-transform: uppercase;
}
.stm_layout_spa.stm_footer_layout_4 .stm-footer .stm-socials a:hover i {
    color: #fff !important;
}
.stm_layout_spa.stm_footer_layout_4 .stm-footer .widget_nav_menu .menu li {
    padding: 0 15px;
    letter-spacing: .6px;
}
@media (max-width: 1024px) {
    .stm-footer .footer-widgets aside.widget {
        width: 100%;
    }
    
}
@media (max-width: 768px) {
    .stm-footer .footer-widgets aside.widget {
        width: 100%;
    }
    .stm_layout_spa.stm_footer_layout_4 .stm-footer .widget_nav_menu .menu {
        flex-direction: column;
        align-items: center;
    }
}
/* footer */

/* staff */
.stm_layout_spa .stm_staff_grid_style_3 .btn {
    padding: 14px 15px;
}
/* staff */

#stm_calendar .table-business,
#stm_calendar .table-times {
    background-color: #fff;
}

@media (min-width: 768px) {
    .stm_cta.style_6 .stm_cta__content {
        max-width: 50%;
    }

    .stm_single_stm_events .stm_markup__content .stm_single_event__form .btn {
        padding-left: 20px !important;
    }
}
.stm_cta.style_6 .stm_cta__link {
    align-self: flex-end;
}

.stm_events_layout_1 .stm_single_stm_events .stm_markup__content .stm_single_event__actions .btn {
    padding-top: 14px;
    padding-bottom: 14px;
}

@media (max-width: 1200px) {
    .stm_single_stm_events .stm_markup__content .stm_single_event__form .agreement {
        margin-bottom: 30px;
    }
}

@media (max-width: 767px) {
    .stm_services_text_carousel_style_1 .owl-dots {
        text-align: center;
    }
    .vc_tta.vc_tta-tabs .vc_tta-panels-container .vc_tta-panels .vc_tta-panel .vc_tta-panel-body {
        padding: 14px 20px;
    }

    .stm_single_post_layout_1 .stm_single_stm_stories {
        margin: 0 15px;
    }
}

body .vc_chart.small_chart canvas {
    width: 210px !important;
    height: 210px !important;
}

</style>
