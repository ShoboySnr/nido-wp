<?php
function stm_theme_options_medicall()
{
	$json = '{
  "post_layout": "6",
  "post_sidebar": "1381",
  "post_sidebar_archive_mobile": "hidden",
  "post_sidebar_position": "right",
  "post_view": "list",
  "post_author": "false",
  "post_comments": "true",
  "post_image": "false",
  "post_info": "false",
  "post_share": "true",
  "post_sidebar_single": "1390",
  "post_sidebar_single_position": "right",
  "post_tags": "true",
  "post_title": "false",
  "main_color": "#04a5dd",
  "secondary_color": "#6cdf66",
  "third_color": "#333333",
  "copyright":"Pearl Theme by <a href=\"https:\/\/themeforest.net\/item\/pearl-true-multiniche-wordpress-theme\/20432158\" target=\"_blank\">Stylemix Themes.<\/a>",
  "copyright_co": "false",
  "copyright_socials": "false",
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
      "social": "fa fa-instagram",
      "url": "#"
    },
    {
      "social": "fa fa-dribbble",
      "url": "#"
    }
  ],
  "footer_bg": "#3d3d3d",
  "footer_bg_image": "",
  "footer_color": "#fff",
  "footer_cols": "4",
  "accordions_style": "style_2",
  "buttons_global_style": "style_6",
  "currency_symbol": "$",
  "currency_symbol_position": "USD",
  "forms_global_style": "style_3",
  "boxed": "false",
  "boxed_bg": "",
  "enable_ajax": "false",
  "ga": "",
  "google_maps_api": "",
  "site_padding": "0",
  "site_width": "1140",
  "google_api_key": "",
  "favicon": "",
  "logo": "20",
  "logo_transparent": "",
  "logo_width": "",
  "pagination_style": "style_6",
  "paypal_currency_code": "USD",
  "paypal_email": "timur@stylemix.net",
  "paypal_mode": "sandbox",
  "preloader": "true",
  "preloader_color": "#04a5dd",
  "sidebars_global_style": "style_6",
  "tabs_style": "style_4",
  "page_title_box": "true",
  "page_title_box_align": "left",
  "page_title_box_bg_image": "",
  "page_title_box_override": "false",
  "page_title_box_style": "style_6",
  "page_title_box_subtitle": "",
  "page_title_box_text_color": "#ffffff",
  "page_title_box_title": "",
  "page_title_box_title_size": "h1",
  "page_title_breadcrumbs": "true",
  "page_title_button": "false",
  "page_title_button_text": "",
  "page_title_button_url": "",
  "tour_style": "style_3",
  "bottom_bar_bg": "",
  "bottom_bar_bottom": "0",
  "bottom_bar_color": "rgba(250, 250, 250, 0.75)",
  "bottom_bar_link_colorhover": "#595959",
  "bottom_bar_text_color": "#595959",
  "bottom_bar_top": "0",
  "header_builder": {
    "bottom": {
      "center": [
        {
          "$$hashKey": "object:286",
          "data": {
            "description": "Mon \u2014 Sat: 8 am \u2014 5 pm, Sunday: CLOSED",
            "icon": "stmicon-med_clock",
            "title": "Open Hours"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Icon Box",
          "order": {
            "mobile": "3100",
            "tablet": "3100"
          },
          "position": [
            "bottom",
            "center",
            "0"
          ],
          "type": "iconbox"
        }
      ],
      "left": [
        {
          "$$hashKey": "object:1839",
          "data": {
            "description": "51 Uxbridge Road, San Francisco W7 3PX",
            "icon": "stmicon-dialpad",
            "style": "style_2",
            "title": "Call Today 020 8567 0707"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Icon Box",
          "order": {
            "mobile": "3100",
            "tablet": "3100"
          },
          "position": [
            "bottom",
            "left",
            "0"
          ],
          "type": "iconbox",
          "value": "style_2"
        }
      ],
      "right": [
        {
          "$$hashKey": "object:279",
          "data": {
            "description": "It\u2019s so fast",
            "icon": "stmicon-med_calendar",
            "text": "Make an Appointment",
            "url": "\/medicall\/online-appointment"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Button Extended",
          "order": {
            "mobile": "3099",
            "tablet": "3099"
          },
          "position": [
            "bottom",
            "right",
            "0"
          ],
          "type": "buttonext"
        }
      ]
    },
    "center": {
      "left": [
        {
          "$$hashKey": "object:1559",
          "data": {
            "uselogo": "true"
          },
          "disabled": {
            "default": "",
            "mobile": "disabled",
            "tablet": "disabled"
          },
          "label": "Image",
          "order": {
            "mobile": "2100",
            "tablet": "1099"
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
          "$$hashKey": "object:1237",
          "data": {
            "id": "3",
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
    },
    "top": {
      "left": [
        {
          "$$hashKey": "object:1206",
          "data": {
            "fwn": "fwn"
          },
          "disabled": {
            "default": "",
            "mobile": "disabled",
            "tablet": "disabled"
          },
          "label": "Text",
          "order": {
            "mobile": "1100",
            "tablet": "1100"
          },
          "position": [
            "top",
            "left",
            "0"
          ],
          "type": "text",
          "value": "High Quality Healthcare in San Diego"
        },
        {
          "$$hashKey": "object:207",
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
              "left": "50"
            }
          },
          "order": {
            "mobile": "1097",
            "tablet": "1098"
          },
          "position": [
            "top",
            "left",
            "1"
          ],
          "type": "socials"
        }
      ],
      "right": [
        {
          "$$hashKey": "object:1208",
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Search",
          "order": {
            "mobile": "1099",
            "tablet": "1097"
          },
          "position": [
            "top",
            "right",
            "0"
          ],
          "type": "search",
          "value": "style_2"
        }
      ]
    }
  },
  "center_header_fullwidth": "false",
  "header_bg": "",
  "header_bg_fill": "full",
  "header_bottom": "32",
  "header_color": "rgba(255, 0, 0, 0)",
  "header_text_color": "#333333",
  "header_text_color_hover": "#04a5dd",
  "header_top": "28",
  "header_socials": [
    {
      "social": "fa fa-facebook",
      "url": "#facebook"
    },
    {
      "social": "fa fa-twitter",
      "url": "#twitter"
    },
    {
      "social": "fa fa-instagram",
      "url": "#instagram"
    },
    {
      "social": "fa fa-linkedin",
      "url": "#linkedin"
    }
  ],
  "main_header_offset": "false",
  "main_header_style": "style_6",
  "main_header_transparent": "false",
  "top_bar_bg": "",
  "top_bar_bottom": "0",
  "top_bar_color": "rgba(255, 255, 255, 0)",
  "top_bar_link_color_hover": "#4c4c4c",
  "top_bar_text_color": "#999999",
  "top_bar_top": "0",
  "page_bc": "false",
  "page_bc_fullwidth": "false",
  "coming_soon_style": "style_1",
  "error_page_bg": "",
  "error_page_style": "style_1",
  "albums": {
    "enabled": "false"
  },
  "divider_mus_1": "",
  "stm_albums_sidebar_single": "default",
  "stm_albums_sidebar_single_mobile": "hidden",
  "stm_albums_sidebar_single_position": "left",
  "divider_donations_1": "",
  "divider_donations_2": "",
  "divider_donations_3": "",
  "donations": {
    "enabled": "false"
  },
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
  "events": {
    "enabled": "false"
  },
  "stm_events_layout": "left",
  "stm_events_sidebar": "default",
  "stm_events_sidebar_position": "left",
  "stm_events_sidebar_single": "default",
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
    "enabled": "true"
  },
  "stm_services_layout": "4",
  "stm_services_sidebar": "default",
  "stm_services_sidebar_position": "left",
  "stm_services_sidebar_single": "1165",
  "stm_services_sidebar_single_mobile": "hidden",
  "stm_services_sidebar_single_position": "right",
  "stm_stories_layout": "left",
  "stm_stories_sidebar_single": "default",
  "stm_stories_sidebar_single_mobile": "hidden",
  "stm_stories_sidebar_single_position": "left",
  "stories": {
    "enabled": "true"
  },
  "testimonials": {
    "enabled": "true"
  },
  "divider_vac_1": "",
  "stm_vacancies_button": "true",
  "stm_vacancies_button_text": "Contact us",
  "stm_vacancies_button_url": "\/medicall\/contacts",
  "stm_vacancies_details": "false",
  "stm_vacancies_layout_single": "4",
  "stm_vacancies_share": "false",
  "stm_vacancies_sidebar_single": "1165",
  "stm_vacancies_sidebar_single_mobile": "hidden",
  "stm_vacancies_sidebar_single_position": "right",
  "vacancies": {
    "enabled": "true"
  },
  "divider_vid_1": "",
  "stm_videos_sidebar_single": "default",
  "stm_videos_sidebar_single_mobile": "hidden",
  "stm_videos_sidebar_single_position": "left",
  "videos": {
    "enabled": "false"
  },
  "shop_items": "3",
  "product_sidebar": "default",
  "product_sidebar_position": "left",
  "blockquote_style": "style_7",
  "body_font": {
    "color": "#595959",
    "fw": "300",
    "ln": "",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": ""
  },
  "h1_settings": {
    "color": "",
    "fw": "",
    "ln": "54",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "48"
  },
  "h2_settings": {
    "color": "",
    "fw": "",
    "ln": "42",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "36"
  },
  "h3_settings": {
    "color": "",
    "fw": "",
    "ln": "36",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "30"
  },
  "h4_settings": {
    "color": "",
    "fw": "",
    "ln": "30",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "24"
  },
  "h5_settings": {
    "color": "",
    "fw": "",
    "ln": "24",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "18"
  },
  "h6_settings": {
    "color": "",
    "fw": "",
    "ln": "18",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": "14"
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
  "link_color": "#04a5dd",
  "link_hover_color": "#04a5dd",
  "list_style": "style_6",
  "p_line_height": "30",
  "p_margin_bottom": "30"
}';
	return $json;
}