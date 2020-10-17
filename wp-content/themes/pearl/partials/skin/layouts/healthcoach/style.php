<?php
/*Colors*/
$main_color = pearl_get_option('main_color');
$secondary_color = pearl_get_option('secondary_color');
$third_color = pearl_get_option('third_color');
?>
.stm-footer .footer-widgets .stm-socials a {
    color: <?php echo wp_kses_post($main_color); ?>
}


.stm_projects_grid_style_1 .stm_projects_carousel__item h4,
.stm_projects_grid_style_2 .stm_projects_carousel__item h5,
.stm_projects_grid_style_4 .stm_projects_carousel__item h4,
.stm_projects_grid_style_5 .stm_projects_carousel__item h4,
.stm_projects_grid_style_3 .stm_projects_carousel__item h5 {
	text-transform: none !important;
}

.stm_vacancies_style_3 .stm_details .info .stm_details__title,
.stm_vacancies_style_3 .stm_vacancies_single_list a .stm_mf,
.stm_testimonials_style_3 .stm_testimonials__info h6,
.stm_staff_container_list .stm_staff_list_style_2 .stm_staff__name,
.stm_schedule_style_1 .event_lesson_tabs a dfn,
.stm_schedule_style_1 .event_lesson_info_content_wrap .event_lesson_info_content .event_lesson_info_title,
.stm_services_style_2 .stm_services__title .h6,
.stm_post_type_list_style_2 .stm_post_type_list__content h4,
.stm_post_type_list_style_1 .stm_post_type_list__content h4,
.stm_widget_posts.style_2>ul li .stm_widget_posts__title,
.stm_widget_posts.style_1 ul li .stm_widget_posts__title {
    text-transform: none !important;
    font-size: 18px;
    line-height: 1.3em;
}
.stm_staff_grid_style_3 .stm_staff__name,
.stm_staff_grid_style_1 .stm_staff__name,
.stm_loop__single h4.mtc_h {
    text-transform: none !important;
    font-size: 24px;
    line-height: 1.3em;
}
.stm_vacancies_style_3 h2 {
    text-transform: none !important;
    font-size: 30px;
    line-height: 1.3em;
}

.stm-footer {
    padding: 58px 0 0;
}

.stm-footer .footer-widgets .widget .widgettitle {
    margin-bottom: 30px;
}

.stm-footer .footer-widgets .widget .widgettitle h4 {
    font-family: inherit;
    text-transform: none !important;
    font-size: 20px;
    opacity: 0.5;
    font-weight: 400;
}

.stm-footer .footer-widgets .widget.stm_wp_widget_text p {
    font-size: 15px;
    line-height: 24px;
}

.stm-footer .footer-widgets .widget.stm_wp_widget_text .stm-socials {
    margin-top: 13px;
}

.stm-footer .footer-widgets .widget.stm_widget_pages ul li {
    margin-bottom: 17px;
}

.stm-footer .footer-widgets .widget.stm_widget_pages ul li a {
    position: relative;
    padding-left: 10px;
    line-height: 16px;
    font-size: 15px;
}

.stm-footer .footer-widgets .widget.stm_widget_pages ul li a:before {
    content: '';
    display: block;
    width: 4px;
    height: 4px;
    position: absolute;
    left: 0;
    top: 7px;
    background-color: #fff;
    border-radius: 50%;
}

.stm-footer .footer-widgets .widget.widget_contacts .widget_contacts_inner {
    padding-right: 10px;
}

.stm-footer .footer-widgets .widget.widget_contacts .stm-icontext__phone {
    margin-bottom: 10px;
}

.stm-footer .footer-widgets .widget.widget_contacts .stm-icontext__icon {
    display: none;
}

.stm-footer .footer-widgets .widget.widget_contacts .stm-icontext__text a {
    border-bottom: 1px solid transparent;
}

.stm-footer .footer-widgets .widget.widget_contacts .stm-icontext__text a:hover {
    border-bottom-color: #fff;
}
.stm-footer .footer-widgets .stm-socials a {
    opacity: 0.5;
}

.stm-footer .footer-widgets .stm-socials a:hover {
    opacity: 1;
}

.stm-footer__bottom {
    padding: 30px 0;
    border: 0 !important;
    color: #888;
    font-size: 15px;
}

.stm-footer__bottom .stm_bottom_copyright {
    font-family: inherit !important;
}
