<?php
/*Colors*/
$main_color = pearl_get_option('main_color');
$secondary_color = pearl_get_option('secondary_color');
$third_color = pearl_get_option('third_color');

/* Fonts */
$fonts = pearl_get_font();
$main_font = $fonts['main'];
$secondary_font = $fonts['secondary'];
?>
body.home #wrapper{
padding-bottom: 0;
}
.stm_layout_dj.is-loading .stm-header {
    display: none;
}

.album-info,
.audio-toggle,
.audio-toggle:after,
.btn,
.btn.btn_loading.loading,
.btn.btn_loading.loading span,
.btn__icon,
.btn_divider .btn__icon:after,
.btn_load span,
.btn_load:before {
    transition: all 0.5s !important;
}
.stm_layout_dj .rev-btn {
    transition: all 0.3s !important;
}
.stm_layout_dj .audio-toggle {
    right: 50%;
    g
}
.stm_layout_dj .audio-toggle:after {
    content: "\e646" !important;
}

.stm_layout_dj .stm-navigation {
    font-family: inherit !important;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 14px;
}

.stm_layout_dj .stm-navigation__default>ul>li ul li {
    border-color: rgba(225,225,225, 0.5);
}

.stm_layout_dj .stm_titlebox_style_1 {
    padding: 200px 0 100px;
}
.stm_layout_dj .stm_titlebox_style_1 .stm_breadcrumbs {
    margin: 20px 0 0;
    font-weight: 600;
    color: #ffffff !important;
}
.stm_layout_dj .stm_titlebox_style_1 .stm_breadcrumbs span {
    color: #ffffff;
    font-weight: 600;
    text-transform: none;
}

.stm_layout_dj .stm_markup__sidebar_divider aside.widget {
    border-bottom: 0;
}
.stm_layout_dj .widget_calendar table {
    margin-bottom: 0;
}
.stm_layout_dj .stm_markup__sidebar_divider aside.widget.stm_widget_categories ul li a {
    font-weight: 500 !important;
}
.stm_layout_dj .stm_markup__sidebar_divider aside.widget.stm_widget_categories ul li:before {
    top: 10px;
    left: 5px;
    font-size: 8px;
    border: 0;
}
.stm_layout_dj .stm_markup__sidebar_divider .widget .stm_select__dropdown li {
    padding-left: 0;
}
.stm_layout_dj .stm_markup__sidebar_divider .widget .stm_select__dropdown li:before {
    display: none;
}

.stm_layout_dj .stm-header.active,
.stm_layout_dj .stm_mobile__header {
    background-color: <?php echo wp_kses_post($third_color); ?> !important;
}

.stm-navigation__default>ul>li ul {
    background-color: <?php echo wp_kses_post($third_color); ?> !important;
}

.stm_events_list_style_9 .stm_event_single_list > div.hasButton .btn {
    border-color: <?php echo wp_kses_post($main_color); ?> !important;
}

.stm_layout_dj .stm-footer .stm-footer__bottom {
    padding: 28px 0 26px;
}
.stm_layout_dj .stm-footer .stm-footer__bottom .stm_markup {
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.stm_layout_dj .stm-footer .stm-footer__bottom .stm_bottom_copyright {
    text-align:center;
    padding: 25px 0 30px;
    text-transform: uppercase;
    font-size: 14px;
    order: 1;
}
.stm_layout_dj .stm-footer .stm-footer__bottom .stm_markup__sidebar {
    width: 100%;
    order: 0;
    padding: 30px 0 25px;
    justify-content: center;
    color: <?php echo wp_kses_post($third_color); ?> !important;
}
.stm_layout_dj .stm-footer .stm-footer__bottom .stm_markup__sidebar .stm-socials a {
    width: 70px;
    height: 70px;
    line-height: 70px;
    font-size: 26px;
    color: #ffffff !important;
    background-color: rgba(34, 34, 34, 0.5);
}
.stm_layout_dj .stm-footer .stm-footer__bottom .stm_markup__sidebar .stm-socials a i {
    color: #ffffff !important;
}

.stm_layout_dj .stm-footer .stm_bottom_copyright span, 
.stm_layout_dj .stm-footer .stm_bottom_copyright a {
    <?php pearl_css_styles($main_font['name']); ?>
}

.stm-footer .footer-widgets {
    padding-bottom: 15px;
}

.stm-footer .footer-widgets aside.widget {
    /*Widgets*/
}

.stm-footer .footer-widgets aside.widget .widgettitle h4 {
    font-size: 15px;
    line-height: 18px;
    font-weight: 400;
}

.stm-footer .footer-widgets aside.widget.widget_tp_widget_recent_tweets ul li {
    padding-left: 0;
}

.stm-footer .footer-widgets aside.widget.widget_tp_widget_recent_tweets ul li:before {
    display: none;
}

.stm-footer__bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.stm-footer .stm_bottom_copyright span, .stm-footer .stm_bottom_copyright a {
    color: #999 !important;
    font-size: 13px !important;
}

@media (max-width: 1023px) {
    .stm-footer .footer-widgets aside.widget {
        width: 100%;
    }

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


.stm_layout_dj .stm_post_comments .logged-in-as a {
    color: #fff !important;
}

.stm_layout_dj .stm_album_info_style_2 .stm_album_info__song_links a:hover {
    color: <?php echo wp_kses_post($main_color); ?> !important;
}

.stm_layout_dj .stm_projects_grid_style_5 .stm_loop {
    margin-bottom: 40px;
}

.stm_layout_dj .music_store_button {
    min-width: 244px;
}
.stm_layout_dj .music_store_button a {
    display: flex;
    flex-direction: column;
    border-radius: 5px;
    padding: 23px 38px 27px 79px !important;
}
.stm_layout_dj .music_store_button a .btn__label {
    line-height: 26px;
    font-size: 22px;
    text-transform: none;
    order: 2;
}
.stm_layout_dj .music_store_button a .btn_subtitle_label {
    margin-top: 4px;
    margin-bottom: 4px;
    font-size: 14px;
    line-height: 14px;
    order: 1;
}
.stm_layout_dj .music_store_button a .btn__icon {
    width: 60px;
}

.stm_layout_dj .stm_icontext_style_5 .stm_icontext__text {
    font-family: inherit;
}

.stm_layout_dj.stm_post_style_8.stm_post_view_grid.blog .site-content {
    margin-bottom: -60px;
}
.stm_layout_dj.stm_post_style_8.stm_post_view_grid .stm_loop__grid .stm_posts_list_single__container {
    height: 100%;
    border-radius: 6px;
}
.stm_layout_dj.stm_post_style_8.stm_post_view_grid .stm_loop__grid .stm_posts_list_single .stm_posts_list_single__image img {
    border-radius: 6px 6px 0 0;
}

.stm_layout_dj.single-post.stm_post_style_8 .stm_post_bg {
    margin-left: -15px;
    margin-right: -15px;
    position: relative;
    border-radius: 0;
}
.stm_layout_dj.single-post.stm_post_style_8 .stm_post_bg:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0, 0.3);
}

.stm_layout_dj #audio-player .mejs-container:before {
    background: #222;
}
.stm_layout_dj #audio-player .mejs-horizontal-volume-slider {
    top: 8px !important;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current:after {
    top: -4px !important;
    width: 9px;
    height: 9px;
}
.stm_layout_dj #audio-player .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
.stm_layout_dj #audio-player .mejs-horizontal-volume-slider .mejs-horizontal-volume-total {
    height: 1px !important;
}
.stm_layout_dj #audio-player .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
    background: #ff0000 !important;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-button.mejs-playpause-button {
    border: 0 !important;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total {
    background: #888 !important;
}
.stm_layout_dj .mejs-time-buffering,
.stm_layout_dj .mejs-time-current,
.stm_layout_dj .mejs-time-float,
.stm_layout_dj .mejs-time-float-corner,
.stm_layout_dj .mejs-time-float-current,
.stm_layout_dj .mejs-time-hovered,
.stm_layout_dj .mejs-time-loaded,
.stm_layout_dj .mejs-time-marker,
.stm_layout_dj .mejs-time-total {
    height: 1px !important;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-button.mejs-prevtrack button,
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-button.mejs-nexttrack button {
    margin-top: 5px;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-button.mejs-playpause-button button {
    margin-top: 10px;
}
.stm_layout_dj .mejs-time-total {
    margin-top: 10px;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-time-rail .mejs-time-total {
    background-color: #888 !important;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-time {
    margin-top: -2px;
    color: #ff0000 !important;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-time span {
    color: #ff0000 !important;
}
.stm_layout_dj #audio-player .mejs-container .mejs-controls .mejs-time-rail span.mejs-time-current {
    background: #ff0000 !important;
}
.archive.stm_header_transparent .stm-header{
    position: relative;
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

@media (min-width: 1199px) {
    .stm_layout_dj.stm_post_style_8.stm_post_view_grid .stm_loop__grid .stm_posts_list_single:last-child {
        margin-bottom: 40px !important;
    }
}

@media (max-width: 1199px) {
    .stm_layout_dj .remove_column_indents .vc_column-inner {
        padding-right: 15px !important;
        padding-left: 15px !important;
    }
}

@media (max-width: 1023px) {
    .stm_layout_dj .stm-header .container {
        padding: 0 15px;
    }
    .archive.stm_header_transparent .stm-header{
        position: fixed;
    }
    body.stm_header_style_8 .stm_megaicon {
        color: #fff !important;
    }
    html body .stm-navigation__default ul li.stm_megamenu>ul.sub-menu>li ul.sub-menu>li:hover>a, 
    html body .stm-navigation__fullwidth ul li.stm_megamenu>ul.sub-menu>li ul.sub-menu>li:hover>a {
        color: <?php echo wp_kses_post($main_color); ?> !important;
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
@media (max-width: 380px) {
    .stm_layout_dj .stm-footer .stm-footer__bottom .stm_markup__sidebar .stm-socials a {
        width: 50px;
        height: 50px;
        line-height: 50px;
        font-size: 22px;
    }
}