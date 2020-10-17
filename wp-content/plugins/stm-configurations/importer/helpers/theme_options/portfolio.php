<?php
function stm_theme_options_portfolio()
{
	$json = '{
  "post_layout": "11",
  "post_sidebar": "26",
  "post_sidebar_archive_mobile": "hidden",
  "post_sidebar_position": "right",
  "post_view": "grid",
  "post_author": "false",
  "post_comments": "false",
  "post_image": "true",
  "post_info": "true",
  "post_share": "true",
  "post_sidebar_single": "false",
  "post_sidebar_single_position": "right",
  "post_tags": "false",
  "post_title": "true",
  "main_color": "#000000",
  "secondary_color": "#ffffff",
  "third_color": "#000000",
  "copyright":"Pearl Theme by <a href=\"https:\/\/themeforest.net\/item\/pearl-true-multiniche-wordpress-theme\/20432158\" target=\"_blank\">Stylemix Themes.<\/a>",
  "copyright_co": "false",
  "copyright_socials": "true",
  "copyright_year": "false",
  "footer_bottom_bg": "",
  "right_text": "",
  "stm_footer_layout": "1",
  "footer_socials": [
    {
      "social": "fa fa-behance",
      "url": "#"
    },
    {
      "social": "fa fa-dribbble",
      "url": "#"
    },
    {
      "social": "fa fa-instagram",
      "url": "#"
    },
    {
      "social": "fa fa-twitter",
      "url": "#"
    }
  ],
  "footer_bg": "rgba(255, 254, 254, 0)",
  "footer_bg_image": "1873",
  "footer_color": "#000000",
  "footer_cols": "2",
  "accordions_style": "style_2",
  "buttons_global_style": "style_11",
  "forms_global_style": "style_3",
  "pagination_style": "style_10",
  "sidebars_global_style": "style_11",
  "tabs_style": "style_2",
  "tour_style": "style_1",
  "boxed": "false",
  "boxed_bg": "",
  "divider_api_1": "",
  "enable_ajax": "false",
  "ga": "",
  "google_api_key": "",
  "logo": "8",
  "preloader": "true",
  "preloader_color": "#000000",
  "site_padding": "0",
  "site_width": "1140",
  "page_title_box": "false",
  "page_title_box_align": "center",
  "page_title_box_bg_color": "rgba(0, 0, 0, 0.65)",
  "page_title_box_bg_image": "1716",
  "page_title_box_line_color": "#ffffff",
  "page_title_box_override": "false",
  "page_title_box_style": "style_2",
  "page_title_box_subtitle": "",
  "page_title_box_subtitle_color": "#ffffff",
  "page_title_box_text_color": "#ffffff",
  "page_title_box_title": "",
  "page_title_box_title_size": "h1",
  "page_title_breadcrumbs": "false",
  "page_title_button": "false",
  "page_title_button_text": "Button",
  "page_title_button_url": "#",
  "bottom_bar_bg": "",
  "bottom_bar_bottom": "15",
  "bottom_bar_color": "#297ee8",
  "bottom_bar_link_colorhover": "#f00",
  "bottom_bar_text_color": "#ffffff",
  "bottom_bar_top": "15",
  "header_builder": {
    "center": {
      "left": [
        {
          "$$hashKey": "object:399",
          "data": {
            "uselogo": "true",
            "width": "254"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Image",
          "order": {
            "mobile": "2100",
            "tablet": "2100"
          },
          "position": [
            "center",
            "left",
            "0"
          ],
          "type": "image"
        }
      ],
      "right": [
        {
          "$$hashKey": "object:976",
          "data": {
            "font": "mf",
            "fsz": "18",
            "fwn": "fwn",
            "id": "2",
            "line": "line_middle",
            "style": "default"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Menu",
          "order": {
            "mobile": "2300",
            "tablet": "2300"
          },
          "position": [
            "center",
            "right",
            "0"
          ],
          "type": "menu"
        }
      ]
    }
  },
  "center_header_fullwidth": "false",
  "header_bg": "1898",
  "header_bg_fill": "full",
  "header_bottom": "5",
  "header_color": "rgba(255, 254, 254, 0)",
  "header_text_color": "#000000",
  "header_text_color_hover": "#000000",
  "header_top": "50",
  "divider_h_socials_1": "",
  "header_socials": "",
  "main_header_offset": "false",
  "main_header_sticky_mobile": "false",
  "main_header_style": "style_11",
  "main_header_transparent": "false",
  "top_bar_bg": "",
  "top_bar_bottom": "25",
  "top_bar_color": "#222222",
  "top_bar_link_color_hover": "#0077ff",
  "top_bar_text_color": "#ffffff",
  "top_bar_top": "25",
  "page_bc": "true",
  "page_bc_fullwidth": "false",
  "show_page_title": "false",
  "coming_soon_style": "style_1",
  "error_page_bg": "2658",
  "error_page_style": "style_4",
  "divider_mus_1": "",
  "stm_albums_sidebar_single": "default",
  "stm_albums_sidebar_single_mobile": "hidden",
  "stm_albums_sidebar_single_position": "left",
  "currency_symbol": "$",
  "currency_symbol_position": "left",
  "divider_api_2": "",
  "divider_currency_1": "",
  "divider_donations_1": "",
  "divider_donations_2": "",
  "divider_donations_3": "",
  "paypal_currency_code": "USD",
  "paypal_email": "timur@stylemix.net",
  "paypal_mode": "sandbox",
  "stm_donations_amount_1": "10",
  "stm_donations_amount_2": "10",
  "stm_donations_amount_3": "10",
  "stm_donations_layout": "left",
  "stm_donations_sidebar": "default",
  "stm_donations_sidebar_position": "left",
  "stm_donations_sidebar_single": "default",
  "stm_donations_sidebar_single_mobile": "hidden",
  "stm_donations_sidebar_single_position": "left",
  "stm_donations_view": "list",
  "divider_events_1": "",
  "divider_events_2": "",
  "stm_events_layout": "1",
  "stm_events_sidebar": "default",
  "stm_events_sidebar_position": "left",
  "stm_events_sidebar_single": "2234",
  "stm_events_sidebar_single_mobile": "hidden",
  "stm_events_sidebar_single_position": "right",
  "stm_events_view": "list",
  "events": {
    "enabled": "false"
  },
  "stories": {
    "enabled": "false"
  },
  "donations": {
    "enabled": "false"
  },
  "videos": {
    "enabled": "false"
  },
  "vacancies": {
    "enabled": "false"
  },
  "albums": {
    "enabled": "false"
  },
  "divider_projects_1": "",
  "divider_projects_2": "",
  "projects": {
    "enabled": "true",
    "name": "Work",
    "plural": "Works",
    "slug": "work"
  },
  "stm_projects_layout": "2",
  "stm_projects_sidebar": "false",
  "stm_projects_sidebar_position": "left",
  "stm_projects_sidebar_single": "false",
  "stm_projects_sidebar_single_mobile": "hidden",
  "stm_projects_sidebar_single_position": "right",
  "stm_projects_view": "grid",
  "divider_services_1": "",
  "divider_services_2": "",
  "stm_services_layout": "left",
  "stm_services_sidebar": "2114",
  "stm_services_sidebar_position": "right",
  "stm_services_sidebar_single": "2291",
  "stm_services_sidebar_single_mobile": "hidden",
  "stm_services_sidebar_single_position": "left",
  "stm_stories_layout": "left",
  "stm_stories_sidebar_single": "default",
  "stm_stories_sidebar_single_mobile": "hidden",
  "stm_stories_sidebar_single_position": "left",
  "divider_vac_1": "",
  "stm_vacancies_button": "true",
  "stm_vacancies_button_text": "Contact Us",
  "stm_vacancies_button_url": "\/contact",
  "stm_vacancies_details": "true",
  "stm_vacancies_layout_single": "3",
  "stm_vacancies_share": "true",
  "stm_vacancies_sidebar_single": "false",
  "stm_vacancies_sidebar_single_mobile": "hidden",
  "stm_vacancies_sidebar_single_position": "left",
  "divider_vid_1": "",
  "stm_videos_sidebar_single": "default",
  "stm_videos_sidebar_single_mobile": "hidden",
  "stm_videos_sidebar_single_position": "left",
  "shop_items": "3",
  "product_sidebar": "false",
  "product_sidebar_position": "right",
  "blockquote_style": "style_10",
  "body_font": {
    "color": "",
    "fw": "400",
    "ln": "30",
    "ls": "",
    "mgb": "",
    "name": "Fira Mono",
    "size": "14"
  },
  "h1_settings": {
    "color": "",
    "fw": "400",
    "ln": "72",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "72"
  },
  "h2_settings": {
    "color": "",
    "fw": "400",
    "ln": "60",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "48"
  },
  "h3_settings": {
    "color": "",
    "fw": "400",
    "ln": "54",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "36"
  },
  "h4_settings": {
    "color": "",
    "fw": "400",
    "ln": "48",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "30"
  },
  "h5_settings": {
    "color": "",
    "fw": "400",
    "ln": "42",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "24"
  },
  "h6_settings": {
    "color": "",
    "fw": "400",
    "ln": "36",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "18"
  },
  "headings_line": "false",
  "headings_line_height": "5",
  "headings_line_position": "top",
  "headings_line_width": "45",
  "secondary_font": {
    "color": "#000000",
    "name": "Rubik",
    "subset": ""
  },
  "link_color": "#000000",
  "link_hover_color": "#000000",
  "list_style": "style_9",
  "p_line_height": "30",
  "p_margin_bottom": "35"
}';
	return $json;
}