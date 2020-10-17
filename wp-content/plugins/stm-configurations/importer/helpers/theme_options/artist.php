<?php
function stm_theme_options_artist()
{
	$json = '{
  "post_layout": "8",
  "post_sidebar": "864",
  "post_sidebar_archive_mobile": "hidden",
  "post_sidebar_position": "right",
  "post_view": "list",
  "post_author": "true",
  "post_comments": "true",
  "post_image": "true",
  "post_info": "true",
  "post_share": "true",
  "post_sidebar_single": "false",
  "post_sidebar_single_position": "left",
  "post_tags": "true",
  "post_title": "true",
  "main_color": "#d61515",
  "secondary_color": "#d61515",
  "third_color": "#0c0c0d",
  "copyright":"Pearl Theme by <a href=\"https:\/\/themeforest.net\/item\/pearl-true-multiniche-wordpress-theme\/20432158\" target=\"_blank\">Stylemix Themes.<\/a>",
  "copyright_co": "false",
  "copyright_socials": "true",
  "copyright_year": "false",
  "footer_bottom_bg": "",
  "right_text": "",
  "footer_socials": [
    {
      "social": "fa fa-facebook",
      "url": "#"
    },
    {
      "social": "fa fa-twitter",
      "url": "#"
    },
    {
      "social": "fa fa-google-plus",
      "url": "#"
    },
    {
      "social": "fa fa-linkedin",
      "url": "#"
    }
  ],
  "footer_bg": "#0c0c0d",
  "footer_bg_image": "",
  "footer_color": "#fff",
  "footer_cols": "3",
  "accordions_style": "style_6",
  "buttons_global_style": "style_8",
  "currency_symbol": "$",
  "currency_symbol_position": "left",
  "forms_global_style": "style_7",
  "boxed": "false",
  "boxed_bg": "",
  "enable_ajax": "true",
  "ga": "",
  "google_maps_api": "",
  "site_padding": "50",
  "site_width": "1150",
  "google_api_key": "",
  "favicon": "",
  "logo": "1127",
  "logo_transparent": "",
  "logo_width": "",
  "pagination_style": "style_8",
  "paypal_currency_code": "USD",
  "paypal_email": "timur@stylemix.net",
  "paypal_mode": "sandbox",
  "preloader": "true",
  "preloader_color": "#d61515",
  "sidebars_global_style": "style_8",
  "tabs_style": "style_5",
  "page_title_box": "true",
  "page_title_box_align": "center",
  "page_title_box_bg_color": "#0d0f13",
  "page_title_box_bg_image": "",
  "page_title_box_override": "false",
  "page_title_box_style": "style_8",
  "page_title_box_subtitle": "",
  "page_title_box_subtitle_color": "#ffffff",
  "page_title_box_text_color": "#ffffff",
  "page_title_box_title": "",
  "page_title_box_title_size": "h1",
  "page_title_breadcrumbs": "false",
  "page_title_button": "false",
  "page_title_button_text": "",
  "page_title_button_url": "",
  "tour_style": "style_1",
  "bottom_bar_bg": "",
  "bottom_bar_bottom": "0",
  "bottom_bar_color": "#f00",
  "bottom_bar_link_colorhover": "#f00",
  "bottom_bar_text_color": "#f00",
  "bottom_bar_top": "0",
  "header_builder": {
    "center": {
      "left": [
        {
          "$$hashKey": "object:868",
          "data": {
            "uselogo": "true"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Image",
          "order": {
            "mobile": "1100",
            "tablet": "1100"
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
          "$$hashKey": "object:230",
          "data": {
            "font": "hf",
            "id": "2",
            "style": "default"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Menu",
          "order": {
            "mobile": "2310",
            "tablet": "2310"
          },
          "position": [
            "center",
            "right",
            "0"
          ],
          "type": "menu"
        },
        {
          "$$hashKey": "object:255",
          "data": {
            "style": "icon_only"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Socials",
          "margins": {
            "default": {
              "left": "30"
            }
          },
          "order": {
            "mobile": "2300",
            "tablet": "2300"
          },
          "position": [
            "center",
            "right",
            "1"
          ],
          "type": "socials"
        }
      ]
    }
  },
  "center_header_fullwidth": "true",
  "header_bg": "",
  "header_bg_fill": "full",
  "header_bottom": "37",
  "header_color": "rgba(255, 254, 254, 0)",
  "header_text_color": "#010101",
  "header_text_color_hover": "#d61515",
  "header_top": "37",
  "header_socials": [
    {
      "social": "fa fa-facebook",
      "url": "#"
    },
    {
      "social": "fa fa-twitter",
      "url": "#"
    },
    {
      "social": "fa fa-instagram",
      "url": "#"
    }
  ],
  "main_header_offset": "false",
  "main_header_style": "style_8",
  "main_header_transparent": "false",
  "top_bar_bg": "",
  "top_bar_bottom": "0",
  "top_bar_color": "#f00",
  "top_bar_link_color_hover": "#f00",
  "top_bar_text_color": "#f00",
  "top_bar_top": "0",
  "page_bc": "true",
  "page_bc_fullwidth": "true",
  "coming_soon_style": "style_1",
  "error_page_bg": "",
  "error_page_style": "style_5",
  "albums": {
    "enabled": "true",
    "has_archive": "true",
    "slug": ""
  },
  "divider_mus_1": "",
  "stm_albums_sidebar_single": "false",
  "stm_albums_sidebar_single_mobile": "hidden",
  "stm_albums_sidebar_single_position": "left",
  "divider_donations_1": "",
  "divider_donations_2": "",
  "divider_donations_3": "",
  "donations": {
    "enabled": "false"
  },
  "stm_donations_amount_1": "10",
  "stm_donations_amount_2": "20",
  "stm_donations_amount_3": "30",
  "stm_donations_layout": "1",
  "stm_donations_sidebar": "default",
  "stm_donations_sidebar_position": "left",
  "stm_donations_sidebar_single": "default",
  "stm_donations_sidebar_single_mobile": "hidden",
  "stm_donations_sidebar_single_position": "left",
  "stm_donations_view": "list",
  "divider_events_1": "",
  "divider_events_2": "",
  "events": {
    "enabled": "true",
    "name": "Tour",
    "plural": "Tours",
    "slug": "tours"
  },
  "stm_events_layout": "2",
  "stm_events_sidebar": "default",
  "stm_events_sidebar_position": "left",
  "stm_events_sidebar_single": "false",
  "stm_events_sidebar_single_mobile": "hidden",
  "stm_events_sidebar_single_position": "left",
  "stm_events_view": "list",
  "divider_projects_1": "",
  "divider_projects_2": "",
  "projects": {
    "enabled": "false"
  },
  "stm_projects_sidebar": "default",
  "stm_projects_sidebar_position": "left",
  "stm_projects_sidebar_single": "default",
  "stm_projects_sidebar_single_mobile": "hidden",
  "stm_projects_sidebar_single_position": "left",
  "stm_projects_view": "grid",
  "divider_services_1": "",
  "divider_services_2": "",
  "services": {
    "enabled": "false"
  },
  "stm_services_layout": "left",
  "stm_services_sidebar": "default",
  "stm_services_sidebar_position": "left",
  "stm_services_sidebar_single": "default",
  "stm_services_sidebar_single_mobile": "hidden",
  "stm_services_sidebar_single_position": "left",
  "stm_stories_layout": "left",
  "stm_stories_sidebar_single": "default",
  "stm_stories_sidebar_single_mobile": "hidden",
  "stm_stories_sidebar_single_position": "left",
  "stories": {
    "enabled": "false"
  },
  "testimonials": {
    "enabled": "false"
  },
  "divider_vac_1": "",
  "stm_vacancies_button": "true",
  "stm_vacancies_button_text": "",
  "stm_vacancies_button_url": "",
  "stm_vacancies_details": "true",
  "stm_vacancies_layout_single": "left",
  "stm_vacancies_share": "true",
  "stm_vacancies_sidebar_single": "default",
  "stm_vacancies_sidebar_single_mobile": "hidden",
  "stm_vacancies_sidebar_single_position": "left",
  "vacancies": {
    "enabled": "false"
  },
  "videos": {
    "enabled": "false"
  },
  "stories": {
    "enabled": "false"
  },
  "divider_vid_1": "",
  "stm_videos_sidebar_single": "default",
  "stm_videos_sidebar_single_mobile": "hidden",
  "stm_videos_sidebar_single_position": "left",
  "shop_sidebar_position": "left",
  "product_single_sidebar_position": "left",
  "blockquote_style": "style_8",
  "body_font": {
    "color": "",
    "fw": "",
    "ln": "",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": ""
  },
  "h1_settings": {
    "color": "",
    "fw": "",
    "ln": "83",
    "ls": "-0.8",
    "mgb": "35",
    "name": "",
    "size": "75"
  },
  "h2_settings": {
    "color": "",
    "fw": "",
    "ln": "55",
    "ls": "-0.6",
    "mgb": "35",
    "name": "",
    "size": "50"
  },
  "h3_settings": {
    "color": "",
    "fw": "",
    "ln": "40",
    "ls": "-1.6",
    "mgb": "30",
    "name": "",
    "size": "36"
  },
  "h4_settings": {
    "color": "",
    "fw": "",
    "ln": "29",
    "ls": "",
    "mgb": "30",
    "name": "",
    "size": "26"
  },
  "h5_settings": {
    "color": "",
    "fw": "",
    "ln": "22",
    "ls": "",
    "mgb": "30",
    "name": "",
    "size": "20"
  },
  "h6_settings": {
    "color": "",
    "fw": "",
    "ln": "17",
    "ls": "",
    "mgb": "25",
    "name": "",
    "size": "15"
  },
  "headings_line": "false",
  "headings_line_height": "5",
  "headings_line_position": "top",
  "headings_line_width": "45",
  "secondary_font": {
    "color": "",
    "name": "",
    "subset": ""
  },
  "link_color": "#d61515",
  "link_hover_color": "#0c0c0d",
  "list_style": "style_1",
  "p_line_height": "24",
  "p_margin_bottom": "23"
}';
	return $json;
}