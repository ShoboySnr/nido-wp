<?php 
function stm_theme_options_rental()
{
	$json = '{
  "post_layout": "10",
  "post_sidebar": "784",
  "post_sidebar_archive_mobile": "hidden",
  "post_sidebar_position": "right",
  "post_view": "list",
  "post_author": "true",
  "post_comments": "true",
  "post_image": "true",
  "post_info": "true",
  "post_share": "true",
  "post_sidebar_single": "784",
  "post_sidebar_single_position": "right",
  "post_tags": "true",
  "post_title": "true",
  "main_color": "#bf9f50",
  "secondary_color": "#bf9f50",
  "third_color": "#1a1a1a",
  "copyright":"Pearl Theme by <a href=\"https:\/\/themeforest.net\/item\/pearl-true-multiniche-wordpress-theme\/20432158\" target=\"_blank\">Stylemix Themes.<\/a>",
  "copyright_co": "true",
  "copyright_socials": "true",
  "copyright_year": "false",
  "footer_bottom_bg": "",
  "right_text": "<a href=\"#top\" class=\"btn btn_outline btn_primary btn_left btn_gradient btn_icon-right\" title=\"Back to Top\" target=\"_self\"><i class=\"btn__icon icon_26px fa fa-angle-up\" aria-hidden=\"true\"><\/i>\n\t<span class=\"btn__label\">Back to Top<\/span>\n<\/a>",
  "stm_footer_layout": "2",
  "footer_socials": [
    {
      "social": "fa fa-twitter",
      "url": "#"
    },
    {
      "social": "fa fa-facebook",
      "url": "#"
    },
    {
      "social": "fa fa-google-plus",
      "url": "#"
    },
    {
      "social": "fa fa-instagram",
      "url": "#"
    }
  ],
  "footer_bg": "#3d3d3d",
  "footer_bg_image": "11",
  "footer_color": "#fff",
  "footer_cols": "4",
  "accordions_style": "style_1",
  "buttons_global_style": "style_10",
  "forms_global_style": "style_9",
  "pagination_style": "style_11",
  "sidebars_global_style": "style_10",
  "tabs_style": "style_1",
  "tour_style": "style_1",
  "boxed": "false",
  "boxed_bg": "",
  "divider_api_1": "",
  "enable_ajax": "false",
  "ga": "",
  "google_api_key": "",
  "logo": "472",
  "preloader": "false",
  "preloader_color": "#f00",
  "site_padding": "0",
  "site_width": "1200",
  "page_title_box": "true",
  "page_title_box_align": "center",
  "page_title_box_bg_image": "1170",
  "page_title_box_override": "false",
  "page_title_box_style": "style_10",
  "page_title_box_subtitle": "",
  "page_title_box_subtitle_color": "#ffffff",
  "page_title_box_text_color": "#ffffff",
  "page_title_box_title": "",
  "page_title_box_title_size": "h2",
  "page_title_breadcrumbs": "false",
  "page_title_button": "false",
  "page_title_button_text": "",
  "page_title_button_url": "",
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
          "$$hashKey": "object:726",
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
          "order": {
            "mobile": "2100",
            "tablet": "2199"
          },
          "position": [
            "center",
            "left",
            "0"
          ],
          "type": "image",
          "value": "472"
        }
      ],
      "right": [
        {
          "$$hashKey": "object:518",
          "data": {
            "font": "mf",
            "fsz": "14",
            "fwn": "fwb",
            "id": "2",
            "lh": "35",
            "style": "default"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Menu",
          "order": {
            "mobile": "2200",
            "tablet": "2200"
          },
          "position": [
            "center",
            "right",
            "0"
          ],
          "type": "menu"
        },
        {
          "$$hashKey": "object:383",
          "choices": {
            "custom": "Custom",
            "wpml": "WPML"
          },
          "data": {
            "style": "style_1"
          },
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "dropdown": [
            {
              "label": "Label1",
              "url": "#"
            },
            {
              "label": "Lbel2",
              "url": "#"
            },
            {
              "label": "Label3",
              "url": "#"
            }
          ],
          "label": "Dropdown",
          "order": {
            "mobile": "2300",
            "tablet": "2300"
          },
          "position": [
            "center",
            "right",
            "1"
          ],
          "style": "style_2",
          "type": "dropdown",
          "value": "wpml"
        }
      ]
    },
    "top": {
      "left": [
        {
          "$$hashKey": "object:695",
          "disabled": {
            "default": "",
            "mobile": "disabled",
            "tablet": "disabled"
          },
          "label": "Search",
          "order": {
            "mobile": "1100",
            "tablet": "2198"
          },
          "position": [
            "top",
            "left",
            "0"
          ],
          "type": "search",
          "value": "style_4"
        }
      ],
      "right": [
        {
          "$$hashKey": "object:1667",
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Sign in",
          "order": {
            "mobile": "2301",
            "tablet": "2301"
          },
          "position": [
            "top",
            "right",
            "0"
          ],
          "type": "signin",
          "woocommerce": "true"
        },
        {
          "$$hashKey": "object:427",
          "disabled": {
            "default": "",
            "mobile": "",
            "tablet": ""
          },
          "label": "Cart",
          "order": {
            "mobile": "2301",
            "tablet": "2302"
          },
          "position": [
            "top",
            "right",
            "1"
          ],
          "type": "cart",
          "value": "style_2",
          "woocommerce": "true"
        }
      ]
    }
  },
  "center_header_fullwidth": "false",
  "header_bg": "",
  "header_bg_fill": "full",
  "header_bottom": "12",
  "header_color": "#282828",
  "header_text_color": "#9b9b9b",
  "header_text_color_hover": "#bf9f50",
  "header_top": "12",
  "divider_h_socials_1": "",
  "header_socials": "",
  "main_header_offset": "false",
  "main_header_sticky_mobile": "false",
  "main_header_style": "style_10",
  "main_header_transparent": "false",
  "top_bar_bg": "",
  "top_bar_bottom": "10",
  "top_bar_color": "#1a1a1a",
  "top_bar_link_color_hover": "#585858",
  "top_bar_text_color": "#585858",
  "top_bar_top": "10",
  "page_bc": "false",
  "page_bc_fullwidth": "false",
  "show_page_title": "false",
  "coming_soon_style": "style_1",
  "error_page_bg": "1170",
  "error_page_style": "style_7",
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
    "has_archive": "false",
    "name": "Deals",
    "plural": "Deals",
    "public": "true",
    "slug": "deals"
  },
  "stm_events_layout": "5",
  "stm_events_sidebar": "728",
  "stm_events_sidebar_position": "right",
  "stm_events_sidebar_single": "728",
  "stm_events_sidebar_single_mobile": "hidden",
  "stm_events_sidebar_single_position": "right",
  "stm_events_view": "list",
  "divider_projects_1": "",
  "divider_projects_2": "",
  "stm_projects_layout": "default",
  "stm_projects_sidebar": "default",
  "stm_projects_sidebar_position": "left",
  "stm_projects_sidebar_single": "default",
  "stm_projects_sidebar_single_mobile": "hidden",
  "stm_projects_sidebar_single_position": "left",
  "stm_projects_view": "grid",
  "divider_services_1": "",
  "divider_services_2": "",
  "projects": {
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
  "services": {
    "enabled": "true",
    "has_archive": "false",
    "public": "true"
  },
  "stm_services_layout": "2",
  "stm_services_sidebar": "default",
  "stm_services_sidebar_position": "left",
  "stm_services_sidebar_single": "false",
  "stm_services_sidebar_single_mobile": "hidden",
  "stm_services_sidebar_single_position": "right",
  "stm_services_single_form": "1055",
  "stm_services_single_phone": "+1 998 150 30 20",
  "stm_stories_layout": "left",
  "stm_stories_sidebar_single": "default",
  "stm_stories_sidebar_single_mobile": "hidden",
  "stm_stories_sidebar_single_position": "left",
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
  "divider_vid_1": "",
  "stm_videos_sidebar_single": "default",
  "stm_videos_sidebar_single_mobile": "hidden",
  "stm_videos_sidebar_single_position": "left",
  "shop_items": "3",
  "product_sidebar": "1010",
  "product_sidebar_position": "right",
  "blockquote_style": "style_9",
  "body_font": {
    "color": "#595959",
    "fw": "400",
    "ln": "30",
    "ls": "",
    "mgb": "",
    "name": "Roboto",
    "size": "16"
  },
  "h1_settings": {
    "color": "#1a1a1a",
    "fw": "700",
    "ln": "66",
    "ls": "",
    "mgb": "",
    "name": "Playfair Display SC",
    "size": "48"
  },
  "h2_settings": {
    "color": "#1a1a1a",
    "fw": "700",
    "ln": "60",
    "ls": "",
    "mgb": "0",
    "name": "Playfair Display SC",
    "size": "42"
  },
  "h3_settings": {
    "color": "#1a1a1a",
    "fw": "700",
    "ln": "54",
    "ls": "",
    "mgb": "0",
    "name": "Playfair Display SC",
    "size": "36"
  },
  "h4_settings": {
    "color": "#1a1a1a",
    "fw": "700",
    "ln": "48",
    "ls": "",
    "mgb": "0",
    "name": "Playfair Display SC",
    "size": "30"
  },
  "h5_settings": {
    "color": "#1a1a1a",
    "fw": "700",
    "ln": "42",
    "ls": "",
    "mgb": "0",
    "name": "Playfair Display SC",
    "size": "24"
  },
  "h6_settings": {
    "color": "#1a1a1a",
    "fw": "700",
    "ln": "36",
    "ls": "",
    "mgb": "0",
    "name": "Playfair Display SC",
    "size": "18"
  },
  "headings_line": "false",
  "headings_line_height": "5",
  "headings_line_position": "top",
  "headings_line_width": "45",
  "secondary_font": {
    "color": "#1a1a1a",
    "name": "Playfair Display SC",
    "subset": ""
  },
  "link_color": "#bf9f50",
  "link_hover_color": "#555555",
  "list_style": "style_8",
  "p_line_height": "22",
  "p_margin_bottom": "15"
}';
	return $json;
}