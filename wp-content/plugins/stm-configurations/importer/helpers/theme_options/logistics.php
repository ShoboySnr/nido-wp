<?php 
function stm_theme_options_logistics()
{
	$json = '{
  "post_layout": "2",
  "post_sidebar": "320",
  "post_sidebar_archive_mobile": "hidden",
  "post_sidebar_position": "right",
  "post_view": "list",
  "post_author": "true",
  "post_comments": "true",
  "post_image": "false",
  "post_info": "true",
  "post_share": "true",
  "post_sidebar_single": "320",
  "post_sidebar_single_position": "right",
  "post_tags": "true",
  "post_title": "true",
  "main_color": "#58c747",
  "secondary_color": "#ff694e",
  "third_color": "#122a4c",
  "copyright":"Pearl Theme by <a href=\"https:\/\/themeforest.net\/item\/pearl-true-multiniche-wordpress-theme\/20432158\" target=\"_blank\">Stylemix Themes.<\/a>",
  "copyright_co": "false",
  "copyright_socials": "false",
  "copyright_year": "false",
  "footer_bottom_bg": "",
  "right_text": "",
  "footer_socials": "",
  "footer_bg": "#002040",
  "footer_bg_image": "",
  "footer_color": "#8090a0",
  "footer_cols": "4",
  "accordions_style": "style_3",
  "buttons_global_style": "style_2",
  "currency_symbol": "$",
  "currency_symbol_position": "left",
  "forms_global_style": "style_2",
  "boxed": "false",
  "boxed_bg": "",
  "enable_ajax": "false",
  "ga": "",
  "google_maps_api": "",
  "site_padding": "0",
  "site_width": "1140",
  "google_api_key": "",
  "favicon": "",
  "logo": "4",
  "logo_transparent": "4",
  "logo_width": "",
  "pagination_style": "style_2",
  "paypal_currency_code": "USD",
  "paypal_email": "timur@stylemix.net",
  "paypal_mode": "sandbox",
  "preloader": "true",
  "preloader_color": "#58c747",
  "sidebars_global_style": "style_3",
  "tabs_style": "style_1",
  "page_title_box": "true",
  "page_title_box_align": "left",
  "page_title_box_bg_color": "rgba(24, 54, 80, 0.35)",
  "page_title_box_bg_image": "836",
  "page_title_box_line_color": "#f00",
  "page_title_box_override": "false",
  "page_title_box_style": "style_3",
  "page_title_box_subtitle": "",
  "page_title_box_subtitle_color": "#f00",
  "page_title_box_text_color": "#ffffff",
  "page_title_box_title": "",
  "page_title_box_title_size": "h2",
  "page_title_breadcrumbs": "false",
  "page_title_button": "false",
  "page_title_button_text": "",
  "page_title_button_url": "",
  "tour_style": "style_1",
  "bottom_bar_bg": "",
  "bottom_bar_bottom": "NaN",
  "bottom_bar_color": "#f00",
  "bottom_bar_link_colorhover": "#f00",
  "bottom_bar_text_color": "#f00",
  "bottom_bar_top": "NaN",
  "header_builder": {
    "center": {
      "left": [
        {
          "$$hashKey": "object:682",
          "data": {
            "uselogo": "false",
            "width": "200"
          },
          "disabled": {
            "default": "",
            "mobile": "disabled",
            "tablet": "disabled"
          },
          "label": "Image",
          "margins": {
            "default": {
              "bottom": "30",
              "top": "30"
            }
          },
          "order": {
            "mobile": "2100",
            "tablet": "2100"
          },
          "position": [
            "center",
            "left",
            "0"
          ],
          "type": "image",
          "value": "4"
        }
      ],
      "right": [
        {
          "$$hashKey": "object:1222",
          "data": {
            "divider": "",
            "id": "2",
            "line": "line_bottom",
            "style": "default"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Menu",
          "margins": {
            "default": {
              "right": "15"
            }
          },
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
          "$$hashKey": "object:712",
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
              "bottom": "30",
              "top": "30"
            },
            "mobile": {
              "bottom": "30",
              "top": "30"
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
    },
    "top": {
      "left": [
        {
          "$$hashKey": "object:754",
          "choices": {
            "custom": "Custom",
            "wpml": "WPML"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "dropdown": [
            {
              "label": "English",
              "url": "#"
            },
            {
              "label": "Russian",
              "url": "#"
            },
            {
              "label": "Arab",
              "url": "#"
            }
          ],
          "label": "Dropdown",
          "order": {
            "mobile": "2311",
            "tablet": "2311"
          },
          "position": [
            "top",
            "left",
            "0"
          ],
          "type": "dropdown",
          "value": "custom"
        }
      ],
      "right": [
        {
          "$$hashKey": "object:1903",
          "data": {
            "icon": "stmicon-globe2",
            "iconColor": {
              "name": "Secondary color",
              "value": "stc"
            },
            "offices": [
              {
                "$$hashKey": "object:1014",
                "info": [
                  {
                    "$$hashKey": "object:1028",
                    "icon": "stmicon-iphone",
                    "label": "Call Free: +1 376-226-3126",
                    "url": "tel:+1 376-226-3126"
                  },
                  {
                    "$$hashKey": "object:1029",
                    "icon": "stmicon-envelope",
                    "label": "info@transcargo.com",
                    "url": "mailto:info@transcargo.com"
                  },
                  {
                    "$$hashKey": "object:1030",
                    "icon": "stmicon-clock5",
                    "label": "Mon \u2014 Sat: 9AM \u2014 6PM",
                    "url": ""
                  }
                ],
                "name": "London office"
              },
              {
                "$$hashKey": "object:1015",
                "info": [
                  {
                    "$$hashKey": "object:1223",
                    "icon": "stmicon-clock5",
                    "label": "Mon \u2014 Sat: 9AM \u2014 6PM",
                    "url": "#"
                  },
                  {
                    "$$hashKey": "object:1681",
                    "icon": "stmicon-envelope",
                    "label": "info@transcargo.com",
                    "url": "mailto:  info@transcargo.com"
                  },
                  {
                    "$$hashKey": "object:1892",
                    "icon": "stmicon-iphone",
                    "label": "Call Free: +1 376-226-3126",
                    "url": "tel:+1 376-226-3126"
                  }
                ],
                "name": "Madrid office"
              }
            ],
            "textColor": {
              "name": "Custom",
              "value": "#ffffff"
            }
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Offices",
          "margins": {
            "default": {
              "bottom": "",
              "top": ""
            }
          },
          "order": {
            "mobile": "1300",
            "tablet": "1300"
          },
          "position": [
            "top",
            "right",
            "0"
          ],
          "type": "offices"
        }
      ]
    }
  },
  "center_header_fullwidth": "false",
  "header_bg": "",
  "header_bg_fill": "full",
  "header_bottom": "NaN",
  "header_color": "rgba(0, 0, 0, 0)",
  "header_text_color": "#ffffff",
  "header_text_color_hover": "#ffffff",
  "header_top": "NaN",
  "header_socials": [
    {
      "social": "fa fa-facebook",
      "url": "http:\/\/fb.com"
    },
    {
      "social": "fa fa-twitter",
      "url": "twitter.com"
    },
    {
      "social": "fa fa-linkedin",
      "url": "linkedin.com"
    }
  ],
  "main_header_offset": "false",
  "main_header_sticky_mobile": "false",
  "main_header_style": "style_3",
  "main_header_transparent": "true",
  "top_bar_bg": "",
  "top_bar_bottom": "NaN",
  "top_bar_color": "rgba(18, 42, 76, 0.65)",
  "top_bar_link_color_hover": "#f00",
  "top_bar_text_color": "#ffffff",
  "top_bar_top": "NaN",
  "page_bc": "true",
  "page_bc_fullwidth": "false",
  "coming_soon_style": "style_1",
  "error_page_bg": "",
  "error_page_style": "center",
  "divider_mus_1": "",
  "stm_albums_sidebar_single": "default",
  "stm_albums_sidebar_single_mobile": "hidden",
  "stm_albums_sidebar_single_position": "left",
  "divider_donations_1": "",
  "divider_donations_2": "",
  "divider_donations_3": "",
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
    "enabled": "false",
    "name": "",
    "plural": "",
    "slug": ""
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
    "enabled": "true",
    "has_archive": "true"
  },
  "stm_services_layout": "left",
  "stm_services_sidebar": "default",
  "stm_services_sidebar_position": "left",
  "stm_services_sidebar_single": "false",
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
    "enabled": "true",
    "name": "Testimonials",
    "plural": "Testimonials",
    "slug": "testimonials"
  },
  "divider_vac_1": "",
  "stm_vacancies_button": "true",
  "stm_vacancies_button_text": "Contact us",
  "stm_vacancies_button_url": "#",
  "stm_vacancies_details": "true",
  "stm_vacancies_layout_single": "2",
  "stm_vacancies_share": "true",
  "stm_vacancies_sidebar_single": "320",
  "stm_vacancies_sidebar_single_mobile": "hidden",
  "stm_vacancies_sidebar_single_position": "right",
  "vacancies": {
    "enabled": "true"
  },
  "albums": {
    "enabled": "false"
  },
  "videos": {
    "enabled": "true"
  },
  "albums": {
    "enabled": "false"
  },
  "divider_vid_1": "",
  "stm_videos_sidebar_single": "default",
  "stm_videos_sidebar_single_mobile": "hidden",
  "stm_videos_sidebar_single_position": "left",
  "shop_items": "3",
  "product_sidebar": "default",
  "product_sidebar_position": "left",
  "blockquote_style": "style_2",
  "body_font": {
    "color": "#999",
    "fw": "400",
    "ln": "30",
    "ls": "",
    "mgb": "",
    "name": "Rubik",
    "size": "16"
  },
  "h1_settings": {
    "color": "",
    "fw": "",
    "ln": "",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": ""
  },
  "h2_settings": {
    "color": "",
    "fw": "",
    "ln": "",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": ""
  },
  "h3_settings": {
    "color": "",
    "fw": "",
    "ln": "",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": ""
  },
  "h4_settings": {
    "color": "",
    "fw": "",
    "ln": "",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": ""
  },
  "h5_settings": {
    "color": "",
    "fw": "",
    "ln": "",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": ""
  },
  "h6_settings": {
    "color": "",
    "fw": "",
    "ln": "",
    "ls": "",
    "mgb": "",
    "name": "",
    "size": ""
  },
  "headings_line": "true",
  "headings_line_height": "5",
  "headings_line_position": "top",
  "headings_line_width": "45",
  "secondary_font": {
    "color": "#002040",
    "name": "Oxygen",
    "subset": ""
  },
  "link_color": "#58c747",
  "link_hover_color": "#58c747",
  "list_style": "style_3",
  "p_line_height": "30",
  "p_margin_bottom": "26"
}';
	return $json;
}