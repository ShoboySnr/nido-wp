<?php
/**
 * Get all WP menus, id => name
 * @return array
 */
function pearl_get_menus()
{
    $menus = array();
    $existing_menus = get_terms('nav_menu');
    if (!empty($existing_menus)) {
        foreach ($existing_menus as $menu) {
            $menus[$menu->term_id] = $menu->name;
        }
    }

    /*Locations*/
    $locations = get_registered_nav_menus();
    $menus = $menus + $locations;

    return $menus;
}

/**
 * Get list of pages page_id => page name
 *
 * @return array
 */
function pearl_get_pages()
{
    $choices = array('' => esc_html__('None', 'pearl'));

    $wp_qargs = array(
        'post_type' => 'page',
        'posts_per_page' => '-1',
        'post_status' => array('publish', 'private')
    );

    $q = new WP_Query($wp_qargs);

    if ($q->have_posts()) {
        while ($q->have_posts()) {
            $q->the_post();
            $choices[get_the_ID()] = get_the_title();
        }
    }

    return $choices;
}

/**
 * Register builder elements
 * @return array
 */
function pearl_builder_elements()
{
    $el = array(
        array(
            'label' => esc_html__('Dropdown', 'pearl'),
            'type' => 'dropdown',
            'choices' => array(
                'custom' => esc_html__('Custom', 'pearl'),
                'wpml' => esc_html__('HB WPML', 'pearl')
            ),
            'value' => 'custom',
        ),
        array(
            'label' => esc_html__('Text', 'pearl'),
            'type' => 'text',
        ),
        array(
            'label' => esc_html__('Offices', 'pearl'),
            'type' => 'offices',
        ),
        array(
            'label' => esc_html__('Image', 'pearl'),
            'type' => 'image',
        ),
        array(
            'label' => esc_html__('Icon Box', 'pearl'),
            'type' => 'iconbox',
        ),
        array(
            'label' => esc_html__('Text with icon', 'pearl'),
            'type' => 'icontext',
        ),
        array(
            'label' => esc_html__('Socials', 'pearl'),
            'type' => 'socials',
        ),
        array(
            'label' => esc_html__('Menu', 'pearl'),
            'type' => 'menu',
        ),
        array(
            'label' => esc_html__('Button', 'pearl'),
            'type' => 'button',
        ),
        array(
            'label' => esc_html__('Button Extended', 'pearl'),
            'type' => 'buttonext',
        ),
        array(
            'label' => esc_html__('Search', 'pearl'),
            'type' => 'search',
        ),
        array(
            'label' => esc_html__('Popup', 'pearl'),
            'type' => 'popup',
        ),
        array(
            'label' => esc_html__('Cart', 'pearl'),
            'woocommerce' => true,
            'type' => 'cart',
        ),
        array(
            'label' => esc_html__('Sign in', 'pearl'),
            'woocommerce' => true,
            'type' => 'signin',
        ),
        array(
            'label' => esc_html__('Post Filter', 'pearl'),
            'type' => 'filter',
            'value' => 'custom',
        ),
        array(
            'label' => esc_html__('Weather widget', 'pearl'),
            'type' => 'weather',
        ),
        array(
            'label' => esc_html__('Font resizer', 'pearl'),
            'type' => 'font-resizer',
        ),
        array(
            'label' => esc_html__('Address', 'pearl'),
            'type' => 'address',
        ),
    );

    return $el;
}

/**
 * Available socials for social picker
 */
function pearl_available_socials()
{
    $socials = array(
        '' => esc_html__('Select Option...', 'pearl'),
        'facebook' => esc_html__('Facebook', 'pearl'),
        'twitter' => esc_html__('Twitter', 'pearl'),
        'vk' => esc_html__('VK', 'pearl'),
        'instagram' => esc_html__('Instagram', 'pearl'),
        'behance' => esc_html__('Behance', 'pearl'),
        'dribbble' => esc_html__('Dribbble', 'pearl'),
        'flickr' => esc_html__('Flickr', 'pearl'),
        'git' => esc_html__('Git', 'pearl'),
        'linkedin' => esc_html__('Linkedin', 'pearl'),
        'pinterest' => esc_html__('Pinterest', 'pearl'),
        'medium' => esc_html__('Medium', 'pearl'),
        'yahoo' => esc_html__('Yahoo', 'pearl'),
        'delicious' => esc_html__('Delicious', 'pearl'),
        'dropbox' => esc_html__('Dropbox', 'pearl'),
        'odnoklassniki' => esc_html__('Odnoklassniki', 'pearl'),
        'odnoklassniki_square' => esc_html__('Odnoklassniki square', 'pearl'),
        'reddit' => esc_html__('Reddit', 'pearl'),
        'soundcloud' => esc_html__('Soundcloud', 'pearl'),
        'google' => esc_html__('Google', 'pearl'),
        'google-plus' => esc_html__('Google +', 'pearl'),
        'skype' => esc_html__('Skype', 'pearl'),
        'youtube' => esc_html__('Youtube', 'pearl'),
        'youtube-play' => esc_html__('Youtube Play', 'pearl'),
        'tumblr' => esc_html__('Tumblr', 'pearl'),
        'whatsapp' => esc_html__('Whatsapp', 'pearl')
    );

    return apply_filters('pearl_available_socials', $socials);
}

/**
 *
 * Main theme options skeleton
 *
 */
function pearl_theme_options_array()
{
    $socials = pearl_available_socials();
    $assets_paths = pearl_get_assets_path();

    $theme_options = array(
        'general' => array(
            'title' => esc_html__('General', 'pearl'),
            'options' => array(
                'global' => array(
                    'title' => esc_html__('Global Settings', 'pearl'),
                    'options' => array(
                        'logo' => array(
                            'type' => 'image',
                            'data' => array(
                                'title' => esc_html__('Logo', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Main theme Logo', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                        'site_width' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Site width (px)', 'pearl'),
                                'desc' => esc_html__('Defines the main content width', 'pearl'),
                                'value' => 1100,
                                'min' => 960,
                                'max' => 1500,
                                'step' => 10,
                            )
                        ),
                        'site_padding' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Site paddings', 'pearl'),
                                'value' => 0,
                                'min' => 0,
                                'max' => 150,
                                'step' => 10,
                            )
                        ),
                        'preloader' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Enable preloader', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'preloader_color' => array(
                            'type' => 'colorpicker',
                            'show' => 'preloader',
                            'data' => array(
                                'title' => esc_html__('Preloader color', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'enable_ajax' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Enable ajax (experimental)', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'boxed' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Site boxed', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'boxed_bg' => array(
                            'type' => 'image',
                            'show' => 'boxed',
                            'data' => array(
                                'title' => esc_html__('Background image ', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Image for boxed site background', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                        'enable_bubbles' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Enable Bubbles animation', 'pearl'),
                                'value' => false,
                            )
                        ),
                    )
                ),
                'title_box' => array(
                    'title' => esc_html__('Title box defaults', 'pearl'),
                    'options' => array(
                        'page_title_box' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Enable title box', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_title_box_tag' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Use div instead of heading tag', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_title_box_style' => array(
                            'type' => 'select',
                            'show' => 'page_title_box',
                            'data' => array(
                                'title' => esc_html__('Select global style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'), //beauty
                                    'style_6' => esc_html__('Style 6', 'pearl'), //medicall
                                    'style_7' => esc_html__('Style 7', 'pearl'), //charity
                                    'style_8' => esc_html__('Style 8', 'pearl'), //artist
                                    'style_9' => esc_html__('Style 9', 'pearl'), //BA
                                    'style_10' => esc_html__('Style 10', 'pearl'), //Rental
                                    'style_11' => esc_html__('Style 11', 'pearl'), //Church
                                    'style_12' => esc_html__('Style 12', 'pearl'), //Magazine
                                    'style_13' => esc_html__('Style 13', 'pearl'), //Psycho
                                    'style_14' => esc_html__('Style 14', 'pearl'), //Reno
                                    'style_15' => esc_html__('Style 15', 'pearl'), //Coffee shop
                                )
                            )
                        ),
                        'page_title_box_override' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Override page settings', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_title_box_category' => array(
                            'type' => 'switch',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Show category', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_title_box_author' => array(
                            'type' => 'switch',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Show author', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_title_box_align' => array(
                            'type' => 'select',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Text align', 'pearl'),
                                'value' => 'center',
                                'choices' => array(
                                    'center' => esc_html__('Center', 'pearl'),
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl'),
                                )
                            )
                        ),
                        'page_title_box_title' => array(
                            'type' => 'text',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Title', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'page_title_box_title_line' => array(
                            'type' => 'switch',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Show Title line', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_title_box_title_size' => array(
                            'type' => 'select',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Title Size', 'pearl'),
                                'value' => 'h1',
                                'choices' => array(
                                    'h1' => esc_html__('H1', 'pearl'),
                                    'h2' => esc_html__('H2', 'pearl'),
                                    'h3' => esc_html__('H3', 'pearl'),
                                    'h5' => esc_html__('H5', 'pearl'),
                                    'h6' => esc_html__('H6', 'pearl'),
                                )
                            ),
                        ),
                        'page_title_box_subtitle' => array(
                            'type' => 'text',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Subtitle text', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'page_title_box_bg_color' => array(
                            'type' => 'colorpicker',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Background color', 'pearl'),
                            )
                        ),
                        'page_title_box_bg_image' => array(
                            'type' => 'image',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Background image', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Image for title box background', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                        'page_title_box_bg_pos' => array(
                            'type' => 'text',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Title Box Background Position', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'page_title_box_text_color' => array(
                            'type' => 'colorpicker',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Text color', 'pearl'),
                            )
                        ),
                        'page_title_box_line_color' => array(
                            'type' => 'colorpicker',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Line color', 'pearl'),
                            )
                        ),
                        'page_title_box_subtitle_color' => array(
                            'type' => 'colorpicker',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Subtitle color', 'pearl'),
                            )
                        ),
                        'page_title_breadcrumbs' => array(
                            'type' => 'switch',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Enable breadcrumbs', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_title_button' => array(
                            'type' => 'switch',
                            'show' => 'page_title_box_override',
                            'data' => array(
                                'title' => esc_html__('Enable title box button', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_title_button_text' => array(
                            'type' => 'text',
                            'show' => 'page_title_button',
                            'data' => array(
                                'title' => esc_html__('Button title', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'page_title_button_url' => array(
                            'type' => 'text',
                            'show' => 'page_title_button',
                            'data' => array(
                                'title' => esc_html__('Button url', 'pearl'),
                                'value' => '',
                            )
                        ),
                    )
                ),
                'elements' => array(
                    'title' => esc_html__('Elements styles', 'pearl'),
                    'options' => array(
                        'buttons_global_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Buttons global style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'),
                                    'style_6' => esc_html__('Style 6', 'pearl'),
                                    'style_7' => esc_html__('Style 7', 'pearl'),
                                    'style_8' => esc_html__('Style 8', 'pearl'),
                                    'style_9' => esc_html__('Style 9', 'pearl'),
                                    'style_10' => esc_html__('Style 10', 'pearl'), //Rental
                                    'style_11' => esc_html__('Style 11', 'pearl'), //Portfolio
                                    'style_12' => esc_html__('Style 12', 'pearl'), //Church
                                    'style_13' => esc_html__('Style 13', 'pearl'), //Personal Blog
                                    'style_14' => esc_html__('Style 14', 'pearl'), //Magazine
                                    'style_15' => esc_html__('Style 15', 'pearl'), //Lawyer
                                    'style_16' => esc_html__('Style 16', 'pearl'), //Psychologist
                                    'style_17' => esc_html__('Style 17', 'pearl'), //Factory
                                    'style_18' => esc_html__('Style 18', 'pearl'), //Corporate
                                    'style_19' => esc_html__('Style 19', 'pearl'), //Furniture
                                    'style_20' => esc_html__('Style 20', 'pearl'), //Renovation
                                    'style_21' => esc_html__('Style 21', 'pearl'), //ADvisory
                                    'style_22' => esc_html__('Style 22', 'pearl'), //Hotel
                                    'style_23' => esc_html__('Style 23', 'pearl'), //Hotel
                                    'style_24' => esc_html__('Style 24', 'pearl'), //GYM
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<a class="btn btn_solid btn_primary">' . esc_html__('Button', 'pearl') . '</a>',
                                        '<a class="btn btn_solid btn_secondary">' . esc_html__('Button', 'pearl') . '</a>',
                                        '<a class="btn btn_solid btn_third">' . esc_html__('Button', 'pearl') . '</a>',
                                        '<a class="btn btn_outline btn_primary">' . esc_html__('Button', 'pearl') . '</a>',
                                        '<a class="btn btn_outline btn_secondary">' . esc_html__('Button', 'pearl') . '</a>',
                                        '<a class="btn btn_outline btn_third">' . esc_html__('Button', 'pearl') . '</a>',
                                        '<a class="btn btn_outline btn_third btn_icon-right"><i class="btn__icon fa fa-chevron-right icon_13px"></i>' . esc_html__('Button', 'pearl') . '</a>',
                                    ),
                                    'type' => 'link',
                                    'attrs' => array(
                                        'class' => array('btn', 'btn_solid', 'btn_primary'),
                                        'href' => '#'
                                    ),
                                    'css' => $assets_paths['css'] . 'buttons/styles/'
                                )
                            )
                        ),
                        'forms_global_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Forms global style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'),
                                    'style_6' => esc_html__('Style 6', 'pearl'),
                                    'style_7' => esc_html__('Style 7', 'pearl'), /*artist*/
                                    'style_8' => esc_html__('Style 8', 'pearl'), /*BA*/
                                    'style_9' => esc_html__('Style 9', 'pearl'), /*Rental*/
                                    'style_10' => esc_html__('Style 10', 'pearl'), /*Church*/
                                    'style_11' => esc_html__('Style 11', 'pearl'), /*Magazine*/
                                    'style_12' => esc_html__('Style 12', 'pearl'), /*Psycho*/
                                    'style_13' => esc_html__('Style 13', 'pearl'), /*Reno*/
                                    'style_14' => esc_html__('Style 14', 'pearl'), /*ADvisory*/
                                    'style_15' => esc_html__('Style 15', 'pearl'), /*Hotel*/
                                    'style_16' => esc_html__('Style 16', 'pearl'), /*Creative two*/
                                    'style_17' => esc_html__('Style 17', 'pearl'), /* Hosting */
                                    'style_18' => esc_html__('Style 18', 'pearl'), /* Food */
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<form>
											<div class="form-group">
												<div>
													<span class="label" style="display: none">' . esc_html__('Your name', 'pearl') . '</span>
													<input type="text" class="form-control" placeholder="' . esc_attr__('Your name', 'pearl') . '">
												</div>
											</div>
											<div class="form-group">
												<div>
													<span class="label" style="display: none">' . esc_html__('Your phone', 'pearl') . '</span>
													<input type="tel" class="form-control" placeholder="' . esc_attr__('Your phone', 'pearl') . '">
												</div>
											</div>
											<div class="form-group">
												<button class="mbc_a" type="submit">' . esc_html__('Submit', 'pearl') . '</button>
											</div>
										</form>
										',
                                    ),
                                    'css' => $assets_paths['css'] . 'form/'
                                )
                            )
                        ),
                        'accordions_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Accordion global style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'),
                                    'style_6' => esc_html__('Style 6', 'pearl'),
                                    'style_7' => esc_html__('Style 7', 'pearl'),
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<div class="vc_tta-container wpb-js-composer" data-vc-action="collapse">
											<div class="vc_general vc_tta vc_tta-accordion vc_tta-o-shape-group">
												<div class="vc_tta-panels-container">
													<div class="vc_tta-panels">
														<div class="vc_tta-panel vc_active" id="1503654625603-3d7ef1f6-ce02"
															 data-vc-content=".vc_tta-panel-body">
															<div class="vc_tta-panel-heading"><h4 class="vc_tta-panel-title"><a
																	href="#1503654625603-3d7ef1f6-ce02" data-vc-accordion=""
																	data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">Section 1</span><i
																	class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4></div>
															<div class="vc_tta-panel-body">
																<div class="wpb_text_column wpb_content_element ">
																	<div class="wpb_wrapper">
																		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur esse illo
																			neque ratione suscipit tempora temporibus totam. Alias asperiores, consectetur
																			deserunt eum odit similique velit veniam voluptatibus! Molestiae, molestias.</p>
										
																	</div>
																</div>
															</div>
														</div>
														<div class="vc_tta-panel" id="1503654625611-fbc07453-6419" data-vc-content=".vc_tta-panel-body">
															<div class="vc_tta-panel-heading"><h4 class="vc_tta-panel-title"><a
																	href="#1503654625611-fbc07453-6419" data-vc-accordion=""
																	data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">Section 2</span><i
																	class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4></div>
															<div class="vc_tta-panel-body">
																<div class="wpb_text_column wpb_content_element ">
																	<div class="wpb_wrapper">
																		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur esse illo
																			neque ratione suscipit tempora temporibus totam. Alias asperiores, consectetur
																			deserunt eum odit similique velit veniam voluptatibus! Molestiae, molestias.</p>
										
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>'
                                    ),
                                    'css' => $assets_paths['css'] . 'accordion/',
                                    'js' => plugins_url() . '/js_composer/assets/lib/vc_accordion/vc-accordion.min.js'
                                )
                            )
                        ),
                        'tabs_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Tabs global style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'),
                                    'style_6' => esc_html__('Style 6', 'pearl'),
                                    'style_7' => esc_html__('Style 7', 'pearl'),
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<div class="vc_tta-container  wpb-js-composer" data-vc-action="collapse">
											<div class="vc_general vc_tta vc_tta-tabs vc_tta-o-shape-group vc_tta-tabs-position-top vc_tta-controls-align-left">
												<div class="vc_tta-tabs-container">
													<ul class="vc_tta-tabs-list">
														<li class="vc_tta-tab vc_active" data-vc-tab=""><a href="#1503652271786-6b72a484-49e1" data-vc-tabs=""
																										   data-vc-container=".vc_tta"><span
																class="vc_tta-title-text">Tab 1</span></a></li>
														<li class="vc_tta-tab" data-vc-tab=""><a href="#1503652271816-75c5636f-425a" data-vc-tabs=""
																								 data-vc-container=".vc_tta"><span class="vc_tta-title-text">Tab 2</span></a>
														</li>
														<li class="vc_tta-tab" data-vc-tab=""><a href="#1503652271816-75c5636f-425ab" data-vc-tabs=""
																								 data-vc-container=".vc_tta"><span class="vc_tta-title-text">Tab 3</span></a>
														</li>
													</ul>
												</div>
												<div class="vc_tta-panels-container">
													<div class="vc_tta-panels">
														<div class="vc_tta-panel vc_active" id="1503652271786-6b72a484-49e1"
															 data-vc-content=".vc_tta-panel-body">
															<div class="vc_tta-panel-heading"><h4 class="vc_tta-panel-title"><a
																	href="#1503652271786-6b72a484-49e1" data-vc-accordion=""
																	data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">Tab 1</span></a></h4>
															</div>
															<div class="vc_tta-panel-body">
																<div class="wpb_text_column wpb_content_element ">
																	<div class="wpb_wrapper">
																		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur esse illo
																			neque ratione suscipit tempora temporibus totam. Alias asperiores, consectetur
																			deserunt eum odit similique velit veniam voluptatibus! Molestiae, molestias.</p>
										
																	</div>
																</div>
															</div>
														</div>
														<div class="vc_tta-panel" id="1503652271816-75c5636f-425a" data-vc-content=".vc_tta-panel-body">
															<div class="vc_tta-panel-heading"><h4 class="vc_tta-panel-title"><a
																	href="#1503652271816-75c5636f-425a" data-vc-accordion=""
																	data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">Tab 2</span></a></h4>
															</div>
															<div class="vc_tta-panel-body">
																<div class="wpb_text_column wpb_content_element ">
																	<div class="wpb_wrapper">
																		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur esse illo
																			neque ratione suscipit tempora temporibus totam. Alias asperiores, consectetur
																			deserunt eum odit similique velit veniam voluptatibus! Molestiae, molestias.</p>
										
																	</div>
																</div>
															</div>
														</div>
														<div class="vc_tta-panel" id="1503652271816-75c5636f-425ab" data-vc-content=".vc_tta-panel-body">
															<div class="vc_tta-panel-heading"><h4 class="vc_tta-panel-title"><a
																	href="#1503652271816-75c5636f-425ab" data-vc-accordion=""
																	data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">Tab 2</span></a></h4>
															</div>
															<div class="vc_tta-panel-body">
																<div class="wpb_text_column wpb_content_element ">
																	<div class="wpb_wrapper">
																		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur esse illo
																			neque ratione suscipit tempora temporibus totam. Alias asperiores, consectetur
																			deserunt eum odit similique velit veniam voluptatibus! Molestiae, molestias.</p>
										
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>'
                                    ),
                                    'css' => $assets_paths['css'] . 'tabs/',
                                    'js' => plugins_url() . '/js_composer/assets/lib/vc_tabs/vc-tabs.min.js'
                                )
                            )
                        ),
                        'tour_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Tour global style', 'pearl'),
                                'dev' => true,
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<div class="vc_tta-container wpb-js-composer" data-vc-action="collapse">
											<div class="vc_general vc_tta vc_tta-tabs vc_tta-o-shape-group vc_tta-tabs-position-left vc_tta-controls-align-left ">
												<div class="vc_tta-tabs-container">
													<ul class="vc_tta-tabs-list">
														<li class="vc_tta-tab vc_active" data-vc-tab=""><a href="#1503661829587-d341101c-0d3e" data-vc-tabs=""
																										   data-vc-container=".vc_tta"><span
																class="vc_tta-title-text">Section 1</span></a></li>
														<li class="vc_tta-tab" data-vc-tab=""><a href="#1503661829615-c6540101-253b" data-vc-tabs=""
																								 data-vc-container=".vc_tta"><span class="vc_tta-title-text">Section 2</span></a>
														</li>
													</ul>
												</div>
												<div class="vc_tta-panels-container">
													<div class="vc_tta-panels">
														<div class="vc_tta-panel vc_active" id="1503661829587-d341101c-0d3e"
															 data-vc-content=".vc_tta-panel-body">
															<div class="vc_tta-panel-heading"><h4 class="vc_tta-panel-title"><a
																	href="#1503661829587-d341101c-0d3e" data-vc-accordion=""
																	data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">Section 1</span></a>
															</h4></div>
															<div class="vc_tta-panel-body">
																<div class="wpb_text_column wpb_content_element ">
																	<div class="wpb_wrapper">
																		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur esse illo
																			neque ratione suscipit tempora temporibus totam. Alias asperiores, consectetur
																			deserunt eum odit similique velit veniam voluptatibus! Molestiae, molestias.</p>
										
																	</div>
																</div>
															</div>
														</div>
														<div class="vc_tta-panel" id="1503661829615-c6540101-253b" data-vc-content=".vc_tta-panel-body">
															<div class="vc_tta-panel-heading"><h4 class="vc_tta-panel-title"><a
																	href="#1503661829615-c6540101-253b" data-vc-accordion=""
																	data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">Section 2</span></a>
															</h4></div>
															<div class="vc_tta-panel-body">
																<div class="wpb_text_column wpb_content_element ">
																	<div class="wpb_wrapper">
																		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur esse illo
																			neque ratione suscipit tempora temporibus totam. Alias asperiores, consectetur
																			deserunt eum odit similique velit veniam voluptatibus! Molestiae, molestias.</p>
										
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>'
                                    ),
                                    'css' => $assets_paths['css'] . 'tours/',
                                )
                            )
                        ),
                        'sidebars_global_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebars global style', 'pearl'),
                                'value' => 'style_1',
                                'dev' => false,
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'),
                                    'style_6' => esc_html__('Style 6', 'pearl'),
                                    'style_7' => esc_html__('Style 7', 'pearl'),
                                    'style_8' => esc_html__('Style 8', 'pearl'),
                                    'style_9' => esc_html__('Style 9', 'pearl'),
                                    'style_10' => esc_html__('Style 10', 'pearl'),
                                    'style_11' => esc_html__('Style 11', 'pearl'),
                                    'style_12' => esc_html__('Style 12', 'pearl'),
                                    'style_13' => esc_html__('Style 13', 'pearl'), /*Personal blog*/
                                    'style_14' => esc_html__('Style 14', 'pearl'), /*Store*/
                                    'style_15' => esc_html__('Style 15', 'pearl'), /*Viral*/
                                    'style_16' => esc_html__('Style 16', 'pearl'), /*Magazine*/
                                    'style_17' => esc_html__('Style 17', 'pearl'), /*Factory*/
                                    'style_18' => esc_html__('Style 18', 'pearl'), /*Psycho*/
                                    'style_19' => esc_html__('Style 19', 'pearl'), /*Company*/
                                    'style_20' => esc_html__('Style 20', 'pearl'), /*Furniture*/
                                    'style_21' => esc_html__('Style 21', 'pearl'), /*Advisory*/
                                )
                            )
                        ),
                        'pagination_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Pagination global Style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'),
                                    'style_6' => esc_html__('Style 6', 'pearl'),
                                    'style_7' => esc_html__('Style 7', 'pearl'),
                                    'style_8' => esc_html__('Style 8', 'pearl'),
                                    'style_9' => esc_html__('Style 9', 'pearl'),
                                    'style_10' => esc_html__('Style 10', 'pearl'),
                                    'style_11' => esc_html__('Style 11', 'pearl'),//Rental
                                    'style_12' => esc_html__('Style 12', 'pearl'),//Personal blog
                                    'style_13' => esc_html__('Style 13', 'pearl'),//Store
                                    'style_14' => esc_html__('Style 14', 'pearl'),//Church
                                    'style_15' => esc_html__('Style 15', 'pearl'),//Factory
                                    'style_16' => esc_html__('Style 16', 'pearl'),//Psycho
                                    'style_17' => esc_html__('Style 17', 'pearl'),//Company
                                    'style_18' => esc_html__('Style 18', 'pearl'),//Corp
                                    'style_19' => esc_html__('Style 19', 'pearl'),//Advisory
                                    'style_20' => esc_html__('Style 20', 'pearl'),//Hotel
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<ul class="page-numbers clearfix  stm_has_next">
											<li class="stm_page_num">
												<span class="page-numbers current">1</span></li>
											<li class="stm_page_num">
												<a class="page-numbers" href="#">2</a></li>
											<li class="stm_next">
												<a class="next page-numbers" href="#"><i
														class="stmicon-arrow-next"></i>
												</a>
											</li>
										</ul>'
                                    ),
                                    'css' => $assets_paths['css'] . 'pagination/',
                                )
                            )
                        ),
                    )
                ),
//                'export' => array(
//                    'title' => esc_html__('Export', 'pearl'),
//                    'options' => array(
//                        'export'      => array(
//                            'type' => 'textarea',
//                            'source' => 'theme_options',
//                            'data' => array(
//                                'title' => esc_html__('Export Options', 'pearl'),
//                                'readonly' => 'true',
//                                'value' => '',
//                            )
//                        ),
//                    )
//                ),
//                'import' => array(
//                    'title' => esc_html__('Import', 'pearl'),
//                    'options' => array(
//                        'export'      => array(
//                            'type' => '',
//                            'data' => array(
//                                'title' => esc_html__('Import options', 'pearl'),
//                                'readonly' => 'true',
//                                'value' => '',
//                            )
//                        ),
//                    )
//                ),
            )
        ),
        'header' => array(
            'title' => esc_html__('Header', 'pearl'),
            'options' => array(
                'main_header' => array(
                    'title' => esc_html__('Header options', 'pearl'),
                    'options' => array(
                        'main_header_transparent' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Header transparent', 'pearl'),
                                'value' => false
                            )
                        ),
                        'main_header_offset' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Header negative offset', 'pearl'),
                                'value' => false
                            )
                        ),
                        'header_sticky' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Select sticky header', 'pearl'),
                                'value' => '',
                                'choices' => array(
                                    '' => esc_html__('None', 'pearl'),
                                    'top' => esc_html__('Top bar', 'pearl'),
                                    'center' => esc_html__('Main header', 'pearl'),
                                    'bottom' => esc_html__('Bottom bar', 'pearl'),
                                )
                            )
                        ),
                        'header_sticky_bg' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Sticky Header background color', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'mobile_header_bg' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Header mobile background color ', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'mobile_header_logo_width' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Header mobile logo width', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'header_bgi' => array(
                            'type' => 'image',
                            'data' => array(
                                'title' => esc_html__('Header background image', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Background image for whole header', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                        'main_header_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Select header style', 'pearl'),
                                'value' => '',
                                'dev' => true,
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'),
                                    'style_6' => esc_html__('Style 6', 'pearl'),
                                    'style_7' => esc_html__('Style 7', 'pearl'),
                                    'style_8' => esc_html__('Style 8', 'pearl'), //artist
                                    'style_9' => esc_html__('Style 9', 'pearl'), //BA
                                    'style_10' => esc_html__('Style 10', 'pearl'), //Rental
                                    'style_11' => esc_html__('Style 11', 'pearl'), //Portfolio
                                    'style_12' => esc_html__('Style 12', 'pearl'), //Blog
                                    'style_13' => esc_html__('Style 13', 'pearl'), //Blog
                                    'style_14' => esc_html__('Style 14', 'pearl'), //Viral
                                    'style_15' => esc_html__('Style 15', 'pearl'), //Magazine
                                    'style_16' => esc_html__('Style 16', 'pearl'), //Lawyer
                                    'style_17' => esc_html__('Style 17', 'pearl'), //Factory
                                    'style_18' => esc_html__('Style 18', 'pearl'), //Psycho
                                    'style_19' => esc_html__('Style 19', 'pearl'), //Company
                                    'style_20' => esc_html__('Style 20', 'pearl'), //Furniture
                                )
                            )
                        ),
                        'main_header_sticky_mobile' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Header fixed on mobile device', 'pearl'),
                                'value' => false
                            )
                        ),
                        'divider_h_socials_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Header Socials', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'header_socials' => array(
                            'type' => 'socials',
                            'data' => array(
                                'title' => esc_html__('Socials', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'social' => esc_html__('Select a site', 'pearl'),
                                    'url' => esc_html__('Enter full URL', 'pearl'),
                                    'new' => esc_html__('Add new', 'pearl')
                                ),
                                'choices' => $socials
                            )
                        ),
                    )
                ),
                'builder' => array(
                    'title' => esc_html__('Header builder', 'pearl'),
                    'options' => array(
                        'header_builder' => array(
                            'type' => 'builder',
                            'data' => array(
                                'title' => esc_html__('Build your dream', 'pearl'),
                                'value' => '',
                            )
                        ),
                    )
                ),
                'top_bar' => array(
                    'title' => esc_html__('Top bar', 'pearl'),
                    'options' => array(
                        'top_bar_top' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Padding top (px)', 'pearl'),
                                'desc' => esc_html__('Set top padding', 'pearl'),
                                'value' => 0,
                                'min' => 0,
                                'max' => 50,
                                'step' => 1,
                            )
                        ),
                        'top_bar_bottom' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Padding bottom (px)', 'pearl'),
                                'desc' => esc_html__('Set bottom padding', 'pearl'),
                                'value' => 0,
                                'min' => 0,
                                'max' => 50,
                                'step' => 1,
                            )
                        ),
                        'top_bar_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Top bar background color', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'top_bar_text_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Top bar text color', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'top_bar_link_color_hover' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Top bar link color on hover', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'top_bar_bg' => array(
                            'type' => 'image',
                            'data' => array(
                                'title' => esc_html__('Background image', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Image for top bar background', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                    )
                ),
                'header' => array(
                    'title' => esc_html__('Main header', 'pearl'),
                    'options' => array(
                        'header_top' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Padding top (px)', 'pearl'),
                                'desc' => esc_html__('Set top padding', 'pearl'),
                                'value' => 0,
                                'min' => 0,
                                'max' => 100,
                                'step' => 1,
                            )
                        ),
                        'header_bottom' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Padding bottom (px)', 'pearl'),
                                'desc' => esc_html__('Set bottom padding', 'pearl'),
                                'value' => 0,
                                'min' => 0,
                                'max' => 100,
                                'step' => 1,
                            )
                        ),
                        'header_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Header background color', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'center_header_fullwidth' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Fullwidth', 'pearl'),
                                'value' => false
                            )
                        ),
                        'header_bg_fill' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Hader background fill', 'pearl'),
                                'value' => 'full',
                                'choices' => array(
                                    'full' => esc_html__('Full', 'pearl'),
                                    'container' => esc_html__('Container', 'pearl')
                                ),
                            )
                        ),
                        'header_text_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Header text color', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'header_text_color_hover' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Header text color on hover', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'header_bg' => array(
                            'type' => 'image',
                            'data' => array(
                                'title' => esc_html__('Background image', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Image for header background', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                    )
                ),
                'bottom_bar' => array(
                    'title' => esc_html__('Bottom bar', 'pearl'),
                    'options' => array(
                        'bottom_bar_top' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Padding top (px)', 'pearl'),
                                'desc' => esc_html__('Set top padding', 'pearl'),
                                'value' => 0,
                                'min' => 0,
                                'max' => 50,
                                'step' => 1,
                            )
                        ),
                        'bottom_bar_bottom' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Padding bottom (px)', 'pearl'),
                                'desc' => esc_html__('Set bottom padding', 'pearl'),
                                'value' => 0,
                                'min' => 0,
                                'max' => 50,
                                'step' => 1,
                            )
                        ),
                        'bottom_bar_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Bottom bar background color', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'bottom_bar_text_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Bottom bar text color', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'bottom_bar_link_colorhover' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Bottom bar link color on hover', 'pearl'),
                                'value' => '#f00',
                            )
                        ),
                        'bottom_bar_bg' => array(
                            'type' => 'image',
                            'data' => array(
                                'title' => esc_html__('Background image', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Image for bottom bar background', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                    )
                ),
            )
        ),
        'colors' => array(
            'title' => esc_html__('Colors', 'pearl'),
            'options' => array(
                'global' => array(
                    'title' => esc_html__('Global Settings', 'pearl'),
                    'options' => array(
                        'main_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Main color', 'pearl'),
                                'value' => '#297ee8',
                            )
                        ),
                        'secondary_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Secondary color', 'pearl'),
                                'value' => '#222222',
                            )
                        ),
                        'third_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Third color', 'pearl'),
                                'value' => '#297ee8',
                            )
                        )
                    )
                )
            )
        ),
        'typography' => array(
            'title' => esc_html__('Typography', 'pearl'),
            'options' => array(
                'body' => array(
                    'title' => esc_html__('Main', 'pearl'),
                    'options' => array(
                        'body_font' => array(
                            'type' => 'font',
                            'data' => array(
                                'title' => esc_html__('Body font', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'size' => esc_html__('Enter font size (px)', 'pearl'),
                                    'ff' => esc_html__('Select font family', 'pearl'),
                                    'ln' => esc_html__('Enter line height (px)', 'pearl'),
                                    'ls' => esc_html__('Enter letter spacing (px)', 'pearl'),
                                    'color' => esc_html__('Select color', 'pearl'),
                                    'subset' => esc_html__('Select subset', 'pearl'),
                                    'fw' => esc_html__('Select font-weight', 'pearl'),
                                )
                            )
                        ),
                    )
                ),
                'headings' => array(
                    'title' => esc_html__('Headings', 'pearl'),
                    'options' => array(
                        'secondary_font' => array(
                            'type' => 'fontcommon',
                            'data' => array(
                                'title' => esc_html__('Headings style', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'color' => esc_html__('Select color', 'pearl'),
                                    'subset' => esc_html__('Select subset', 'pearl'),
                                )
                            )
                        ),
                        'h1_settings' => array(
                            'type' => 'font',
                            'data' => array(
                                'title' => esc_html__('H1 font style', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'size' => esc_html__('Enter font size (px)', 'pearl'),
                                    'ff' => esc_html__('Select font family', 'pearl'),
                                    'ln' => esc_html__('Enter line height (px)', 'pearl'),
                                    'ls' => esc_html__('Enter letter spacing (px)', 'pearl'),
                                    'mgb' => esc_html__('Enter margin bottom (px)', 'pearl'),
                                    'color' => esc_html__('Select color', 'pearl'),
                                    'subset' => esc_html__('Select subset', 'pearl'),
                                    'fw' => esc_html__('Select font-weight', 'pearl'),
                                )
                            )
                        ),
                        'h2_settings' => array(
                            'type' => 'font',
                            'data' => array(
                                'title' => esc_html__('H2 font style', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'size' => esc_html__('Enter font size (px)', 'pearl'),
                                    'ff' => esc_html__('Select font family', 'pearl'),
                                    'ln' => esc_html__('Enter line height (px)', 'pearl'),
                                    'ls' => esc_html__('Enter letter spacing (px)', 'pearl'),
                                    'mgb' => esc_html__('Enter margin bottom (px)', 'pearl'),
                                    'color' => esc_html__('Select color', 'pearl'),
                                    'subset' => esc_html__('Select subset', 'pearl'),
                                    'fw' => esc_html__('Select font-weight', 'pearl'),
                                )
                            )
                        ),
                        'h3_settings' => array(
                            'type' => 'font',
                            'data' => array(
                                'title' => esc_html__('H3 font style', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'size' => esc_html__('Enter font size (px)', 'pearl'),
                                    'ff' => esc_html__('Select font family', 'pearl'),
                                    'ln' => esc_html__('Enter line height (px)', 'pearl'),
                                    'ls' => esc_html__('Enter letter spacing (px)', 'pearl'),
                                    'mgb' => esc_html__('Enter margin bottom (px)', 'pearl'),
                                    'color' => esc_html__('Select color', 'pearl'),
                                    'subset' => esc_html__('Select subset', 'pearl'),
                                    'fw' => esc_html__('Select font-weight', 'pearl'),
                                )
                            )
                        ),
                        'h4_settings' => array(
                            'type' => 'font',
                            'data' => array(
                                'title' => esc_html__('H4 font style', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'size' => esc_html__('Enter font size (px)', 'pearl'),
                                    'ff' => esc_html__('Select font family', 'pearl'),
                                    'ln' => esc_html__('Enter line height (px)', 'pearl'),
                                    'ls' => esc_html__('Enter letter spacing (px)', 'pearl'),
                                    'mgb' => esc_html__('Enter margin bottom (px)', 'pearl'),
                                    'color' => esc_html__('Select color', 'pearl'),
                                    'subset' => esc_html__('Select subset', 'pearl'),
                                    'fw' => esc_html__('Select font-weight', 'pearl'),
                                )
                            )
                        ),
                        'h5_settings' => array(
                            'type' => 'font',
                            'data' => array(
                                'title' => esc_html__('H5 font style', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'size' => esc_html__('Enter font size (px)', 'pearl'),
                                    'ff' => esc_html__('Select font family', 'pearl'),
                                    'ln' => esc_html__('Enter line height (px)', 'pearl'),
                                    'ls' => esc_html__('Enter letter spacing (px)', 'pearl'),
                                    'mgb' => esc_html__('Enter margin bottom (px)', 'pearl'),
                                    'color' => esc_html__('Select color', 'pearl'),
                                    'subset' => esc_html__('Select subset', 'pearl'),
                                    'fw' => esc_html__('Select font-weight', 'pearl'),
                                )
                            )
                        ),
                        'h6_settings' => array(
                            'type' => 'font',
                            'data' => array(
                                'title' => esc_html__('H6 font style', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'size' => esc_html__('Enter font size (px)', 'pearl'),
                                    'ff' => esc_html__('Select font family', 'pearl'),
                                    'ln' => esc_html__('Enter line height (px)', 'pearl'),
                                    'ls' => esc_html__('Enter letter spacing (px)', 'pearl'),
                                    'mgb' => esc_html__('Enter margin bottom (px)', 'pearl'),
                                    'color' => esc_html__('Select color', 'pearl'),
                                    'subset' => esc_html__('Select subset', 'pearl'),
                                    'fw' => esc_html__('Select font-weight', 'pearl'),
                                )
                            )
                        ),
                        'headings_line' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Enable headings line', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'headings_line_position' => array(
                            'type' => 'select',
                            'show' => 'headings_line',
                            'data' => array(
                                'title' => esc_html__('Heading line position', 'pearl'),
                                'value' => 'top',
                                'choices' => array(
                                    'top' => esc_html__('Top', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl'),
                                    'bottom' => esc_html__('Bottom', 'pearl'),
                                )
                            )
                        ),
                        'headings_line_width' => array(
                            'type' => 'slider',
                            'show' => 'headings_line',
                            'data' => array(
                                'title' => esc_html__('Heading line width', 'pearl'),
                                'value' => 45,
                                'min' => 1,
                                'max' => 300,
                                'step' => 1
                            )
                        ),
                        'headings_line_height' => array(
                            'type' => 'slider',
                            'show' => 'headings_line',
                            'data' => array(
                                'title' => esc_html__('Heading line height', 'pearl'),
                                'value' => 5,
                                'min' => 1,
                                'max' => 15,
                                'step' => 1
                            )
                        ),
                    )
                ),
                'typo_styles' => array(
                    'title' => esc_html__('Paragraph settings', 'pearl'),
                    'options' => array(
                        'p_margin_bottom' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Paragraph margin bottom', 'pearl'),
                                'value' => '15',
                                'min' => '0',
                                'max' => '50',
                                'step' => '1'
                            )
                        ),
                        'p_line_height' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Line height', 'pearl'),
                                'value' => '22',
                                'min' => '0',
                                'max' => '150',
                                'step' => '1'
                            )
                        )
                    )
                ),
                'link' => array(
                    'title' => esc_html__('Link Settings', 'pearl'),
                    'options' => array(
                        'link_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Link color', 'pearl'),
                                'value' => '#3c98ff',
                            )
                        ),
                        'link_hover_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Link hover color', 'pearl'),
                                'value' => '#3c98ff',
                            )
                        ),
                    )
                ),
                'blockquote' => array(
                    'title' => esc_html__('Blockquote Settings', 'pearl'),
                    'options' => array(
                        'blockquote_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Blockquote style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'),
                                    'style_6' => esc_html__('Style 6', 'pearl'),
                                    'style_7' => esc_html__('Style 7', 'pearl'),
                                    'style_8' => esc_html__('Style 8', 'pearl'),
                                    'style_9' => esc_html__('Style 9', 'pearl'), //Rental
                                    'style_10' => esc_html__('Style 10', 'pearl'), //Portfolio
                                    'style_11' => esc_html__('Style 11', 'pearl'), //P blog
                                    'style_12' => esc_html__('Style 12', 'pearl'), //Store
                                    'style_13' => esc_html__('Style 13', 'pearl'), //Magazine
                                    'style_14' => esc_html__('Style 14', 'pearl'), //Psycho
                                    'style_15' => esc_html__('Style 15', 'pearl'), // Coffee-shop
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<blockquote><p>"' . esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cupiditate fugit id, incidunt ipsam quisquam repellat totam.', 'pearl') . '"</p></blockquote>'
                                    ),
                                    'css' => $assets_paths['css'] . 'blockquote/'
                                )

                            ),
                        ),
                    )
                ),
                'list' => array(
                    'title' => esc_html__('Lists Settings', 'pearl'),
                    'options' => array(
                        'list_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Lists style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'), //HC
                                    'style_6' => esc_html__('Style 6', 'pearl'), //Medic-all
                                    'style_7' => esc_html__('Style 7', 'pearl'), //BA
                                    'style_8' => esc_html__('Style 8', 'pearl'), //Rental
                                    'style_9' => esc_html__('Style 9', 'pearl'), //Portfolio
                                    'style_10' => esc_html__('Style 10', 'pearl'), //church
                                    'style_11' => esc_html__('Style 11', 'pearl'), //Factory
                                    'style_12' => esc_html__('Style 12', 'pearl'), //Hotel
                                    'style_13' => esc_html__('Style 13', 'pearl'), // Hosting
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<div class="wpb_text_column"><ul><li>' . esc_html__('Lorem', 'pearl') . '</li><li>' . esc_html__('Lorem', 'pearl') . '</li><li>' . esc_html__('Lorem', 'pearl') . '</li></ul></div>'
                                    ),
                                    'css' => $assets_paths['css'] . 'lists/'
                                )
                            )
                        ),
                    )
                ),
            )
        ),
        'page' => array(
            'title' => esc_html__('Page', 'pearl'),
            'options' => array(
                'breadcrubms' => array(
                    'title' => esc_html__('General', 'pearl'),
                    'options' => array(
                        'show_page_title' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Page title', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_bc' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show NavXT Breadcrumbs', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'page_bc_fullwidth' => array(
                            'type' => 'switch',
                            'show' => 'page_bc',
                            'data' => array(
                                'title' => esc_html__('NavXT Breadcrumbs Fullwidth', 'pearl'),
                                'value' => false
                            )
                        ),
                        'page_pre_content_box' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Enable Pre Content', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_pre_content' => array(
                            'type' => 'select',
                            'show' => 'page_pre_content_box',
                            'data' => array(
                                'title' => esc_html__('Select global pre content', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_pre_content',
                            )
                        ),
                        'page_pre_footer_box' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Enable Pre Footer', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'page_pre_footer' => array(
                            'type' => 'select',
                            'show' => 'page_pre_footer_box',
                            'data' => array(
                                'title' => esc_html__('Select global pre footer', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_pre_footer',
                            )
                        ),
                    )
                ),
                'error_page' => array(
                    'title' => esc_html__('404 Page', 'pearl'),
                    'options' => array(
                        'error_page_style' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Error Page style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                    'style_2' => esc_html__('Style 2', 'pearl'),
                                    'style_3' => esc_html__('Style 3', 'pearl'),
                                    'style_4' => esc_html__('Style 4', 'pearl'),
                                    'style_5' => esc_html__('Style 5', 'pearl'), /*artist*/
                                    'style_6' => esc_html__('Style 6', 'pearl'), /*BA*/
                                    'style_7' => esc_html__('Style 7', 'pearl'), /*Rental*/
                                ),
                                'preview' => array(
                                    'html' => array(
                                        '<div class="stm_errorpage">
										<div class="stm_errorpage__inner">
											<h1>' . esc_html__('404', 'pearl') . '</h1>
											<h2 style="margin-bottom: 43px">' . esc_html__('The page you are looking for does not exist.', 'pearl') . '</h2>
											<a href="#" class="btn btn_primary btn_solid">' . esc_html__('Go back to homepage', 'pearl') . '</a>
										</div>
									</div>'
                                    ),
                                    'css' => $assets_paths['css'] . '404/'
                                )
                            )
                        ),
                        'error_page_bg' => array(
                            'type' => 'image',
                            'data' => array(
                                'title' => esc_html__('Background image', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Image background for 404 page', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                    )
                ),
                'coming_soon_page' => array(
                    'title' => esc_html__('Coming soon Page', 'pearl'),
                    'options' => array(
                        'coming_soon_style' => array(
                            'type' => 'select',
                            'dev' => true,
                            'data' => array(
                                'title' => esc_html__('Coming soon page style', 'pearl'),
                                'value' => 'style_1',
                                'choices' => array(
                                    'style_1' => esc_html__('Style 1', 'pearl'),
                                )
                            )
                        ),
                    )
                ),
            )
        ),
        'blog' => array(
            'title' => esc_html__('Blog', 'pearl'),
            'options' => array(
                'archive' => array(
                    'title' => esc_html__('Archive', 'pearl'),
                    'options' => array(
                        'post_layout' => array(
                            'type' => 'select',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Blog Layout', 'pearl'),
                                'value' => '1',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                    '2' => esc_html__('Layout 2', 'pearl'),
                                    '3' => esc_html__('Layout 3', 'pearl'),
                                    '4' => esc_html__('Layout 4', 'pearl'),
                                    '5' => esc_html__('Layout 5', 'pearl'),
                                    '6' => esc_html__('Layout 6', 'pearl'),
                                    '7' => esc_html__('Layout 7', 'pearl'),
                                    '8' => esc_html__('Layout 8', 'pearl'),
                                    '9' => esc_html__('Layout 9', 'pearl'), //BA
                                    '10' => esc_html__('Layout 10', 'pearl'), //Rental
                                    '11' => esc_html__('Layout 11', 'pearl'), //Portfolio
                                    '12' => esc_html__('Layout 12', 'pearl'), //Personal blog
                                    '13' => esc_html__('Layout 13', 'pearl'), //Store
                                    '14' => esc_html__('Layout 14', 'pearl'), //Personal Blog
                                    '15' => esc_html__('Layout 15', 'pearl'), //Personal Blog
                                    '16' => esc_html__('Layout 16', 'pearl'), //Personal Blog
                                    '17' => esc_html__('Layout 17', 'pearl'), //Viral
                                    '18' => esc_html__('Layout 18', 'pearl'), //Viral
                                    '19' => esc_html__('Layout 19', 'pearl'), //Viral
                                    '20' => esc_html__('Layout 20', 'pearl'), //Viral
                                    '21' => esc_html__('Layout 21', 'pearl'), //Magazine
                                    '22' => esc_html__('Layout 22', 'pearl'), //Magazine interview
                                    '23' => esc_html__('Layout 23', 'pearl'), //Factory
                                    '24' => esc_html__('Layout 24', 'pearl'), //Psycho
                                    '25' => esc_html__('Layout 25', 'pearl'), //Coffee shop
                                    '26' => esc_html__('Layout 26', 'pearl'), //Creative Agency Three
                                )
                            )
                        ),
                        'post_view' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Blog view', 'pearl'),
                                'value' => 'list',
                                'choices' => array(
                                    'list' => esc_html__('List', 'pearl'),
                                    'grid' => esc_html__('Grid', 'pearl')
                                )
                            )
                        ),
                        'post_sidebar' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'post_sidebar_position' => array(
                            'type' => 'select',
                            'show' => 'post_sidebar',
                            'show_value' => 'false',
                            'equal' => 'false',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'post_sidebar_archive_mobile' => array(
                            'type' => 'select',
                            'show' => 'post_sidebar',
                            'show_value' => 'false',
                            'equal' => 'false',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_post_popular_day' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Views amount for becoming Trending (Popular for the last day)', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_post_popular_month' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Views amount for becoming Hot (Popular for the last month)', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_post_popular_top' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Views amount for becoming Popular (Popular for the all time)', 'pearl'),
                                'value' => ''
                            )
                        ),
                    )
                ),
                'single' => array(
                    'title' => esc_html__('Single Post', 'pearl'),
                    'options' => array(
                        'post_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'post_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'post_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'false',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'post_title' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Post Title', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'post_info' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Post Info', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'post_image' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Post Image', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'post_tags' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Post Tags', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'post_share' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Post Share', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'post_author' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Post Author', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'post_comments' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Post Comments', 'pearl'),
                                'value' => true,
                            )
                        ),
                    )
                ),
            )
        ),
        'shop' => array(
            'title' => esc_html__('Shop', 'pearl'),
            'options' => array(
                'layout' => array(
                    'title' => esc_html__('Layout', 'pearl'),
                    'options' => array(
                        'stm_shop_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Shop layout', 'pearl'),
                                'value' => 'business',
                                'choices' => array(
                                    'business' => 'business',
                                    'store' => 'store',
                                    'coffee-shop' => 'coffee-shop',
                                )
                            )
                        ),
                    )
                ),
                'archive' => array(
                    'title' => esc_html__('Archive', 'pearl'),
                    'options' => array(
                        'shop_items' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Show products per row', 'pearl'),
                                'value' => '3',
                                'choices' => array(
                                    '6' => 6,
                                    '5' => 5,
                                    '4' => 4,
                                    '3' => 3,
                                    '2' => 2,
                                )
                            )
                        ),
                    )
                ),
                'single' => array(
                    'title' => esc_html__('Single Product', 'pearl'),
                    'options' => array(
                        'product_sidebar' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Product page Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'product_sidebar_position' => array(
                            'type' => 'select',
                            'show' => 'product_sidebar',
                            'show_value' => '',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'thumbnails_view_vertical' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Vertical carousel', 'pearl'),
                                'value' => false,
                            )
                        ),
                        'thumbnails_quantity' => array(
                            'type' => 'select',
                            'show' => 'thumbnails_view_vertical',
                            'data' => array(
                                'title' => esc_html__('Thumbnails quantity', 'pearl'),
                                'value' => '5',
                                'choices' => array(
                                    '1' => esc_html__('1', 'pearl'),
                                    '2' => esc_html__('2', 'pearl'),
                                    '3' => esc_html__('3', 'pearl'),
                                    '4' => esc_html__('4', 'pearl'),
                                    '5' => esc_html__('5', 'pearl'),
                                    '6' => esc_html__('6', 'pearl'),
                                    '7' => esc_html__('7', 'pearl'),
                                    '8' => esc_html__('8', 'pearl'),
                                    '9' => esc_html__('9', 'pearl'),
                                    '10' => esc_html__('10', 'pearl'),
                                )
                            )
                        ),
                    )
                ),
            )
        ),
        'post_types' => array(
            'title' => esc_html__('Post types', 'pearl'),
            'options' => array(
                'projects' => array(
                    'title' => esc_html__('Projects', 'pearl'),
                    'options' => array(
                        'projects' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Projects', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                ),
                            )
                        ),
                        'divider_projects_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Projects Archive Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_projects_view' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Projects view', 'pearl'),
                                'value' => 'grid',
                                'choices' => array(
                                    'grid' => esc_html__('Grid', 'pearl')
                                )
                            )
                        ),
                        'stm_projects_sidebar' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_projects_sidebar_position' => array(
                            'type' => 'select',
                            'show' => 'stm_projects_sidebar',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'divider_projects_2' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Projects Single Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_projects_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Project layout', 'pearl'),
                                'value' => 'default',
                                'choices' => array(
                                    '1' => esc_html__('Style 1', 'pearl'),
                                    '2' => esc_html__('Style 2', 'pearl'),
                                )
                            )
                        ),
                        'stm_projects_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_projects_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_projects_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_projects_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_projects_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                    )
                ),
                'events' => array(
                    'title' => esc_html__('Events', 'pearl'),
                    'options' => array(
                        'events' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Events', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_events_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Events Archive Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_events_view' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Events view', 'pearl'),
                                'value' => 'list',
                                'choices' => array(
                                    'list' => esc_html__('List', 'pearl')
                                )
                            )
                        ),
                        'stm_events_sidebar' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_events_sidebar_position' => array(
                            'type' => 'select',
                            'show' => 'stm_events_sidebar',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'divider_events_2' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Events Single Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_events_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Event Layout', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                    '2' => esc_html__('Layout 2', 'pearl'),
                                    '3' => esc_html__('Layout 3', 'pearl'),
                                    '4' => esc_html__('Layout 4', 'pearl'),
                                    '5' => esc_html__('Layout 5', 'pearl'), //Rental
                                    '6' => esc_html__('Layout 6', 'pearl'), //Dark Creative Agency
                                )
                            )
                        ),
                        'stm_events_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_events_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_events_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_events_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_events_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                    )
                ),
                'services' => array(
                    'title' => esc_html__('Services', 'pearl'),
                    'options' => array(
                        'services' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Services', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_services_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Services Archive Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
//						'stm_services_view'                    => array(
//							'type' => 'select',
//							'data' => array(
//								'title'   => esc_html__('Services view', 'pearl'),
//								'value'   => 'grid',3
//								'choices' => array(
//									'grid' => esc_html__('Grid', 'pearl')
//								)
//							)
//						),
                        'stm_services_sidebar' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_services_sidebar_position' => array(
                            'type' => 'select',
                            'show' => 'stm_services_sidebar',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'divider_services_2' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Services Single Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_services_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Service Layout', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                    '2' => esc_html__('Layout 2', 'pearl'),//Rental
                                )
                            )
                        ),
                        'stm_services_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_services_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_services_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_services_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_services_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'stm_services_single_form' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Select form', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'wpcf7_contact_form',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_services_single_phone' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Phone number', 'pearl'),
                                'value' => ''
                            )
                        ),
                    )
                ),
                'testimonials' => array(
                    'title' => esc_html__('Testimonials', 'pearl'),
                    'options' => array(
                        'testimonials' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Testimonials', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                )
                            )
                        ),
                    )
                ),
                'stm_stories' => array(
                    'title' => esc_html__('Success Stories', 'pearl'),
                    'options' => array(
                        'stories' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Stories', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_services_2' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Story Single Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_stories_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Stories Single Layout', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                )
                            )
                        ),
                        'stm_stories_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Story Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_stories_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_stories_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_stories_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_stories_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Single Story Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                    )
                ),
                'vacancies' => array(
                    'title' => esc_html__('Vacancies', 'pearl'),
                    'options' => array(
                        'vacancies' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Vacancies', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_vac_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Single Vacancy Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_vacancies_layout_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Vacancy Layout', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                    '2' => esc_html__('Layout 2', 'pearl'),
                                    '3' => esc_html__('Layout 3', 'pearl'),
                                    '4' => esc_html__('Layout 4', 'pearl'),
                                )
                            )
                        ),
                        'stm_vacancies_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Vacancy Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_vacancies_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_vacancies_sidebar',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_vacancies_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'post_sidebar',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Single Vacancy Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'stm_vacancies_share' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Share', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'stm_vacancies_details' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Details', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'stm_vacancies_button' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show Button', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'stm_vacancies_button_text' => array(
                            'type' => 'text',
                            'show' => 'stm_vacancies_button',
                            'data' => array(
                                'title' => esc_html__('Button Text', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_vacancies_button_url' => array(
                            'type' => 'text',
                            'show' => 'stm_vacancies_button',
                            'data' => array(
                                'title' => esc_html__('Button URL', 'pearl'),
                                'value' => ''
                            )
                        ),
                    )
                ),
                'donations' => array(
                    'title' => esc_html__('Donations', 'pearl'),
                    'options' => array(
                        'donations' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Donations', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_donations_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Donations Archive Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_donations_view' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Donations view', 'pearl'),
                                'value' => 'list',
                                'choices' => array(
                                    'list' => esc_html__('List', 'pearl')
                                )
                            )
                        ),
                        'stm_donations_sidebar' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_donations_sidebar_position' => array(
                            'type' => 'select',
                            'show' => 'stm_donations_sidebar',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'divider_donations_2' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Donations Single Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_donations_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Donation Layout', 'pearl'),
                                'value' => '1',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                )
                            )
                        ),
                        'stm_donations_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_donations_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_events_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_donations_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_donations_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'divider_donations_3' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Donations Global Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_donations_amount_1' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Donation amount 1:', 'pearl'),
                                'value' => 10
                            )
                        ),
                        'stm_donations_amount_2' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Donation amount 2:', 'pearl'),
                                'value' => 20
                            )
                        ),
                        'stm_donations_amount_3' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Donation amount 3:', 'pearl'),
                                'value' => 30
                            )
                        ),
                        'divider_api_2' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Paypal Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'paypal_email' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Your PayPal email', 'pearl'),
                                'value' => get_bloginfo('admin_email')
                            )
                        ),
                        'paypal_currency_code' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Currency code:', 'pearl'),
                                'value' => 'USD',
                                'choices' => array(
                                    'AUD', 'BRL', 'CAD', 'CZK', 'DKK', 'EUR', 'HKD', 'HUF', 'ILS', 'JPY', 'MYR', 'MXN', 'TWD', 'NZD', 'NOK', 'PHP', 'PLN', 'GBP', 'RUB', 'SGD', 'SEK', 'CHF', 'THB', 'USD'
                                )
                            )
                        ),
                        'paypal_mode' => array(
                            'type' => 'select',
                            'data' => array(
                                'value' => 'sandbox',
                                'choices' => array(
                                    'sandbox' => esc_html__('Sandbox', 'pearl'),
                                    'live' => esc_html__('Live', 'pearl')
                                )
                            )
                        ),
                        'divider_currency_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Currency Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'currency_symbol' => array(
                            'type' => 'text',
                            'data' => array(
                                'title' => esc_html__('Currency symbol', 'pearl'),
                                'value' => '$'
                            )
                        ),
                        'currency_symbol_position' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Currency symbol position:', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl'),
                                )
                            )
                        ),
                    )
                ),
                'albums' => array(
                    'title' => esc_html__('Music', 'pearl'),
                    'options' => array(
                        'albums' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Albums', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_mus_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Single Album Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_albums_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Album Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_albums',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_albums_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_albums_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_albums_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_albums_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Single Album Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                    )
                ),
                'videos' => array(
                    'title' => esc_html__('Video', 'pearl'),
                    'options' => array(
                        'videos' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Videos', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_vid_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Single Video Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_videos_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Video Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_videos',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_videos_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_videos_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_videos_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_videos_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Single Video Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                    )
                ),
                'media_events' => array(
                    'title' => esc_html__('Media Events', 'pearl'),
                    'options' => array(
                        'stm_media_events' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Media Events', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_media_events_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Single Media Event Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_media_events_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Event Layout', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                )
                            )
                        ),
                        'stm_media_events_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Media Event Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_media_events',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_media_events_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_media_events_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_media_events_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_media_events_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Single Media Event Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                    )
                ),

                'stm_staff' => array(
                    'title' => esc_html__('Staff', 'pearl'),
                    'options' => array(
                        'stm_staff' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Staff', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                )
                            )
                        ),
                    )
                ),

                'products' => array(
                    'title' => esc_html__('Products', 'pearl'),
                    'options' => array(
                        'products' => array(
                            'type' => 'posttype',
                            'data' => array(
                                'title' => esc_html__('Products', 'pearl'),
                                'i18n' => array(
                                    'slug' => esc_html__('Slug', 'pearl'),
                                    'name' => esc_html__('Name', 'pearl'),
                                    'plural' => esc_html__('Plural', 'pearl'),
                                    'enabled' => esc_html__('Enable', 'pearl'),
                                    'archive' => esc_html__('Enable Archive Page', 'pearl'),
                                    'single' => esc_html__('Enable Single Page', 'pearl'),
                                )
                            )
                        ),
                        'divider_products_1' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Products Archive Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_products_view' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Products view', 'pearl'),
                                'value' => 'grid',
                                'choices' => array(
                                    'grid' => esc_html__('Grid', 'pearl')
                                )
                            )
                        ),
                        'stm_products_sidebar' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_products_sidebar_position' => array(
                            'type' => 'select',
                            'show' => 'stm_products_sidebar',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                        'divider_products_2' => array(
                            'type' => 'divider',
                            'data' => array(
                                'title' => esc_html__('Products Single Page Settings', 'pearl'),
                                'value' => ''
                            )
                        ),
                        'stm_products_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Single Product Layout', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                    '2' => esc_html__('Layout 2', 'pearl'),
                                    '3' => esc_html__('Layout 3', 'pearl'), //furniture
                                )
                            )
                        ),
                        'stm_products_sidebar_single' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Sidebar', 'pearl'),
                                'value' => 'default',
                                'post_type' => 'stm_sidebars',
                                'choices' => array(
                                    'default' => esc_html__('Default', 'pearl')
                                )
                            )
                        ),
                        'stm_products_sidebar_single_mobile' => array(
                            'type' => 'select',
                            'show' => 'stm_products_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Hide sidebar on mobile', 'pearl'),
                                'value' => 'hidden',
                                'choices' => array(
                                    'hidden' => esc_html__('Hide', 'pearl'),
                                    'show' => esc_html__('Show', 'pearl')
                                )
                            )
                        ),
                        'stm_products_sidebar_single_position' => array(
                            'type' => 'select',
                            'show' => 'stm_products_sidebar_single',
                            'show_value' => 'false',
                            'equal' => 'true',
                            'data' => array(
                                'title' => esc_html__('Sidebar position', 'pearl'),
                                'value' => 'left',
                                'choices' => array(
                                    'left' => esc_html__('Left', 'pearl'),
                                    'right' => esc_html__('Right', 'pearl')
                                )
                            )
                        ),
                    )
                ),
            )
        ),
        'footer' => array(
            'title' => esc_html__('Footer', 'pearl'),
            'options' => array(
                'main' => array(
                    'title' => esc_html__('Main', 'pearl'),
                    'options' => array(
                        'footer_cols' => array(
                            'type' => 'slider',
                            'data' => array(
                                'title' => esc_html__('Number of columns', 'pearl'),
                                'value' => 4,
                                'min' => 1,
                                'max' => 4,
                                'step' => 1,
                            )
                        ),
                        'footer_bg' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Footer background color', 'pearl'),
                                'value' => '#3d3d3d',
                            )
                        ),
                        'footer_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Footer text color', 'pearl'),
                                'value' => '#fff',
                            )
                        ),
                        'footer_bg_image' => array(
                            'type' => 'image',
                            'data' => array(
                                'title' => esc_html__('Background image', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Image for footer background', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                        'scroll_top_button' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Enable scroll top button', 'pearl'),
                                'value' => false
                            )
                        ),
                    )
                ),
                'footer_socials' => array(
                    'title' => esc_html__('Socials', 'pearl'),
                    'options' => array(
                        'footer_socials' => array(
                            'type' => 'socials',
                            'data' => array(
                                'title' => esc_html__('Socials', 'pearl'),
                                'value' => '',
                                'i18n' => array(
                                    'social' => esc_html__('Select a site', 'pearl'),
                                    'url' => esc_html__('Enter full URL', 'pearl'),
                                    'new' => esc_html__('Add new', 'pearl')
                                ),
                                'choices' => $socials
                            )
                        ),

                    )
                ),
                'copyright' => array(
                    'title' => esc_html__('Copyright', 'pearl'),
                    'options' => array(
                        'stm_footer_layout' => array(
                            'type' => 'select',
                            'data' => array(
                                'title' => esc_html__('Footer Layout', 'pearl'),
                                'value' => '1',
                                'choices' => array(
                                    '1' => esc_html__('Layout 1', 'pearl'),
                                    '2' => esc_html__('Layout 2', 'pearl'),
                                    '3' => esc_html__('Layout 3', 'pearl'),
                                    '4' => esc_html__('Layout 4', 'pearl'),
                                )
                            )
                        ),
                        'footer_bottom_bg' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Background color', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'footer_bottom_color' => array(
                            'type' => 'colorpicker',
                            'data' => array(
                                'title' => esc_html__('Text color', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'copyright' => array(
                            'type' => 'textarea',
                            'data' => array(
                                'title' => esc_html__('Copyright text', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'copyright_image' => array(
                            'type' => 'image',
                            'data' => array(
                                'title' => esc_html__('Image in the center', 'pearl'),
                                'value' => '',
                                'description' => esc_html__('Image will appear in the middle of copyright section', 'pearl'),
                                'i18n' => array(
                                    'add' => esc_html__('Add image', 'pearl'),
                                    'remove' => esc_html__('Remove image', 'pearl'),
                                    'replace' => esc_html__('Replace image', 'pearl')
                                )
                            )
                        ),
                        'right_text' => array(
                            'type' => 'textarea',
                            'data' => array(
                                'title' => esc_html__('Right text', 'pearl'),
                                'value' => '',
                            )
                        ),
                        'copyright_year' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show current year', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'copyright_co' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show copyright symbol', 'pearl'),
                                'value' => true,
                            )
                        ),
                        'copyright_socials' => array(
                            'type' => 'switch',
                            'data' => array(
                                'title' => esc_html__('Show socials', 'pearl'),
                                'value' => true,
                            )
                        ),
                    )
                ),
            )
        ),
    );

    return apply_filters('pearl_theme_options', $theme_options);
}

/**
 * Fontawesome array
 *
 * @return mixed|void
 */
function pearl_fontawesome_list()
{
    $fontawesome = array(
        "fa fa-500px" => "500px",
        "fa fa-adjust" => "Adjust",
        "fa fa-adn" => "Adn",
        "fa fa-align-center" => "Align Center",
        "fa fa-align-justify" => "Align Justify",
        "fa fa-align-left" => "Align Left",
        "fa fa-align-right" => "Align Right",
        "fa fa-amazon" => "Amazon",
        "fa fa-ambulance" => "Ambulance",
        "fa fa-anchor" => "Anchor",
        "fa fa-android" => "Android",
        "fa fa-angellist" => "Angellist",
        "fa fa-angle-double-down" => "Angle Double Down",
        "fa fa-angle-double-left" => "Angle Double Left",
        "fa fa-angle-double-right" => "Angle Double Right",
        "fa fa-angle-double-up" => "Angle Double Up",
        "fa fa-angle-down" => "Angle Down",
        "fa fa-angle-left" => "Angle Left",
        "fa fa-angle-right" => "Angle Right",
        "fa fa-angle-up" => "Angle Up",
        "fa fa-apple" => "Apple",
        "fa fa-archive" => "Archive",
        "fa fa-area-chart" => "Area Chart",
        "fa fa-arrow-circle-down" => "Arrow Circle Down",
        "fa fa-arrow-circle-left" => "Arrow Circle Left",
        "fa fa-arrow-circle-o-down" => "Arrow Circle O Down",
        "fa fa-arrow-circle-o-left" => "Arrow Circle O Left",
        "fa fa-arrow-circle-o-right" => "Arrow Circle O Right",
        "fa fa-arrow-circle-o-up" => "Arrow Circle O Up",
        "fa fa-arrow-circle-right" => "Arrow Circle Right",
        "fa fa-arrow-circle-up" => "Arrow Circle Up",
        "fa fa-arrow-down" => "Arrow Down",
        "fa fa-arrow-left" => "Arrow Left",
        "fa fa-arrow-right" => "Arrow Right",
        "fa fa-arrow-up" => "Arrow Up",
        "fa fa-arrows" => "Arrows",
        "fa fa-arrows-alt" => "Arrows Alt",
        "fa fa-arrows-h" => "Arrows H",
        "fa fa-arrows-v" => "Arrows V",
        "fa fa-asterisk" => "Asterisk",
        "fa fa-at" => "At",
        "fa fa-automobile" => "Automobile",
        "fa fa-backward" => "Backward",
        "fa fa-balance-scale" => "Balance Scale",
        "fa fa-ban" => "Ban",
        "fa fa-bank" => "Bank",
        "fa fa-bar-chart" => "Bar Chart",
        "fa fa-bar-chart-o" => "Bar Chart O",
        "fa fa-barcode" => "Barcode",
        "fa fa-bars" => "Bars",
        "fa fa-battery-0" => "Battery 0",
        "fa fa-battery-1" => "Battery 1",
        "fa fa-battery-2" => "Battery 2",
        "fa fa-battery-3" => "Battery 3",
        "fa fa-battery-4" => "Battery 4",
        "fa fa-battery-empty" => "Battery Empty",
        "fa fa-battery-full" => "Battery Full",
        "fa fa-battery-half" => "Battery Half",
        "fa fa-battery-quarter" => "Battery Quarter",
        "fa fa-battery-three-quarters" => "Battery Three Quarters",
        "fa fa-bed" => "Bed",
        "fa fa-beer" => "Beer",
        "fa fa-behance" => "Behance",
        "fa fa-behance-square" => "Behance Square",
        "fa fa-bell" => "Bell",
        "fa fa-bell-o" => "Bell O",
        "fa fa-bell-slash" => "Bell Slash",
        "fa fa-bell-slash-o" => "Bell Slash O",
        "fa fa-bicycle" => "Bicycle",
        "fa fa-binoculars" => "Binoculars",
        "fa fa-birthday-cake" => "Birthday Cake",
        "fa fa-bitbucket" => "Bitbucket",
        "fa fa-bitbucket-square" => "Bitbucket Square",
        "fa fa-bitcoin" => "Bitcoin",
        "fa fa-black-tie" => "Black Tie",
        "fa fa-bluetooth" => "Bluetooth",
        "fa fa-bluetooth-b" => "Bluetooth B",
        "fa fa-bold" => "Bold",
        "fa fa-bolt" => "Bolt",
        "fa fa-bomb" => "Bomb",
        "fa fa-book" => "Book",
        "fa fa-bookmark" => "Bookmark",
        "fa fa-bookmark-o" => "Bookmark O",
        "fa fa-briefcase" => "Briefcase",
        "fa fa-btc" => "Btc",
        "fa fa-bug" => "Bug",
        "fa fa-building" => "Building",
        "fa fa-building-o" => "Building O",
        "fa fa-bullhorn" => "Bullhorn",
        "fa fa-bullseye" => "Bullseye",
        "fa fa-bus" => "Bus",
        "fa fa-buysellads" => "Buysellads",
        "fa fa-cab" => "Cab",
        "fa fa-calculator" => "Calculator",
        "fa fa-calendar" => "Calendar",
        "fa fa-calendar-check-o" => "Calendar Check O",
        "fa fa-calendar-minus-o" => "Calendar Minus O",
        "fa fa-calendar-o" => "Calendar O",
        "fa fa-calendar-plus-o" => "Calendar Plus O",
        "fa fa-calendar-times-o" => "Calendar Times O",
        "fa fa-camera" => "Camera",
        "fa fa-camera-retro" => "Camera Retro",
        "fa fa-car" => "Car",
        "fa fa-caret-down" => "Caret Down",
        "fa fa-caret-left" => "Caret Left",
        "fa fa-caret-right" => "Caret Right",
        "fa fa-caret-square-o-down" => "Caret Square O Down",
        "fa fa-caret-square-o-left" => "Caret Square O Left",
        "fa fa-caret-square-o-right" => "Caret Square O Right",
        "fa fa-caret-square-o-up" => "Caret Square O Up",
        "fa fa-caret-up" => "Caret Up",
        "fa fa-cart-arrow-down" => "Cart Arrow Down",
        "fa fa-cart-plus" => "Cart Plus",
        "fa fa-cc" => "Cc",
        "fa fa-cc-amex" => "Cc Amex",
        "fa fa-cc-diners-club" => "Cc Diners Club",
        "fa fa-cc-discover" => "Cc Discover",
        "fa fa-cc-jcb" => "Cc Jcb",
        "fa fa-cc-mastercard" => "Cc Mastercard",
        "fa fa-cc-paypal" => "Cc Paypal",
        "fa fa-cc-stripe" => "Cc Stripe",
        "fa fa-cc-visa" => "Cc Visa",
        "fa fa-certificate" => "Certificate",
        "fa fa-chain" => "Chain",
        "fa fa-chain-broken" => "Chain Broken",
        "fa fa-check" => "Check",
        "fa fa-check-circle" => "Check Circle",
        "fa fa-check-circle-o" => "Check Circle O",
        "fa fa-check-square" => "Check Square",
        "fa fa-check-square-o" => "Check Square O",
        "fa fa-chevron-circle-down" => "Chevron Circle Down",
        "fa fa-chevron-circle-left" => "Chevron Circle Left",
        "fa fa-chevron-circle-right" => "Chevron Circle Right",
        "fa fa-chevron-circle-up" => "Chevron Circle Up",
        "fa fa-chevron-down" => "Chevron Down",
        "fa fa-chevron-left" => "Chevron Left",
        "fa fa-chevron-right" => "Chevron Right",
        "fa fa-chevron-up" => "Chevron Up",
        "fa fa-child" => "Child",
        "fa fa-chrome" => "Chrome",
        "fa fa-circle" => "Circle",
        "fa fa-circle-o" => "Circle O",
        "fa fa-circle-o-notch" => "Circle O Notch",
        "fa fa-circle-thin" => "Circle Thin",
        "fa fa-clipboard" => "Clipboard",
        "fa fa-clock-o" => "Clock O",
        "fa fa-clone" => "Clone",
        "fa fa-close" => "Close",
        "fa fa-cloud" => "Cloud",
        "fa fa-cloud-download" => "Cloud Download",
        "fa fa-cloud-upload" => "Cloud Upload",
        "fa fa-cny" => "Cny",
        "fa fa-code" => "Code",
        "fa fa-code-fork" => "Code Fork",
        "fa fa-codepen" => "Codepen",
        "fa fa-codiepie" => "Codiepie",
        "fa fa-coffee" => "Coffee",
        "fa fa-cog" => "Cog",
        "fa fa-cogs" => "Cogs",
        "fa fa-columns" => "Columns",
        "fa fa-comment" => "Comment",
        "fa fa-comment-o" => "Comment O",
        "fa fa-commenting" => "Commenting",
        "fa fa-commenting-o" => "Commenting O",
        "fa fa-comments" => "Comments",
        "fa fa-comments-o" => "Comments O",
        "fa fa-compass" => "Compass",
        "fa fa-compress" => "Compress",
        "fa fa-connectdevelop" => "Connectdevelop",
        "fa fa-contao" => "Contao",
        "fa fa-copy" => "Copy",
        "fa fa-copyright" => "Copyright",
        "fa fa-creative-commons" => "Creative Commons",
        "fa fa-credit-card" => "Credit Card",
        "fa fa-credit-card-alt" => "Credit Card Alt",
        "fa fa-crop" => "Crop",
        "fa fa-crosshairs" => "Crosshairs",
        "fa fa-css3" => "Css3",
        "fa fa-cube" => "Cube",
        "fa fa-cubes" => "Cubes",
        "fa fa-cut" => "Cut",
        "fa fa-cutlery" => "Cutlery",
        "fa fa-dashboard" => "Dashboard",
        "fa fa-dashcube" => "Dashcube",
        "fa fa-database" => "Database",
        "fa fa-dedent" => "Dedent",
        "fa fa-delicious" => "Delicious",
        "fa fa-desktop" => "Desktop",
        "fa fa-deviantart" => "Deviantart",
        "fa fa-diamond" => "Diamond",
        "fa fa-digg" => "Digg",
        "fa fa-dollar" => "Dollar",
        "fa fa-dot-circle-o" => "Dot Circle O",
        "fa fa-download" => "Download",
        "fa fa-dribbble" => "Dribbble",
        "fa fa-dropbox" => "Dropbox",
        "fa fa-drupal" => "Drupal",
        "fa fa-edge" => "Edge",
        "fa fa-edit" => "Edit",
        "fa fa-eject" => "Eject",
        "fa fa-ellipsis-h" => "Ellipsis H",
        "fa fa-ellipsis-v" => "Ellipsis V",
        "fa fa-empire" => "Empire",
        "fa fa-envelope" => "Envelope",
        "fa fa-envelope-o" => "Envelope O",
        "fa fa-envelope-square" => "Envelope Square",
        "fa fa-eraser" => "Eraser",
        "fa fa-eur" => "Eur",
        "fa fa-euro" => "Euro",
        "fa fa-exchange" => "Exchange",
        "fa fa-exclamation" => "Exclamation",
        "fa fa-exclamation-circle" => "Exclamation Circle",
        "fa fa-exclamation-triangle" => "Exclamation Triangle",
        "fa fa-expand" => "Expand",
        "fa fa-expeditedssl" => "Expeditedssl",
        "fa fa-external-link" => "External Link",
        "fa fa-external-link-square" => "External Link Square",
        "fa fa-eye" => "Eye",
        "fa fa-eye-slash" => "Eye Slash",
        "fa fa-eyedropper" => "Eyedropper",
        "fa fa-facebook" => "Facebook",
        "fa fa-facebook-f" => "Facebook F",
        "fa fa-facebook-official" => "Facebook Official",
        "fa fa-facebook-square" => "Facebook Square",
        "fa fa-fast-backward" => "Fast Backward",
        "fa fa-fast-forward" => "Fast Forward",
        "fa fa-fax" => "Fax",
        "fa fa-feed" => "Feed",
        "fa fa-female" => "Female",
        "fa fa-fighter-jet" => "Fighter Jet",
        "fa fa-file" => "File",
        "fa fa-file-archive-o" => "File Archive O",
        "fa fa-file-audio-o" => "File Audio O",
        "fa fa-file-code-o" => "File Code O",
        "fa fa-file-excel-o" => "File Excel O",
        "fa fa-file-image-o" => "File Image O",
        "fa fa-file-movie-o" => "File Movie O",
        "fa fa-file-o" => "File O",
        "fa fa-file-pdf-o" => "File Pdf O",
        "fa fa-file-photo-o" => "File Photo O",
        "fa fa-file-picture-o" => "File Picture O",
        "fa fa-file-powerpoint-o" => "File Powerpoint O",
        "fa fa-file-sound-o" => "File Sound O",
        "fa fa-file-text" => "File Text",
        "fa fa-file-text-o" => "File Text O",
        "fa fa-file-video-o" => "File Video O",
        "fa fa-file-word-o" => "File Word O",
        "fa fa-file-zip-o" => "File Zip O",
        "fa fa-files-o" => "Files O",
        "fa fa-film" => "Film",
        "fa fa-filter" => "Filter",
        "fa fa-fire" => "Fire",
        "fa fa-fire-extinguisher" => "Fire Extinguisher",
        "fa fa-firefox" => "Firefox",
        "fa fa-flag" => "Flag",
        "fa fa-flag-checkered" => "Flag Checkered",
        "fa fa-flag-o" => "Flag O",
        "fa fa-flash" => "Flash",
        "fa fa-flask" => "Flask",
        "fa fa-flickr" => "Flickr",
        "fa fa-floppy-o" => "Floppy O",
        "fa fa-folder" => "Folder",
        "fa fa-folder-o" => "Folder O",
        "fa fa-folder-open" => "Folder Open",
        "fa fa-folder-open-o" => "Folder Open O",
        "fa fa-font" => "Font",
        "fa fa-fonticons" => "Fonticons",
        "fa fa-fort-awesome" => "Fort Awesome",
        "fa fa-forumbee" => "Forumbee",
        "fa fa-forward" => "Forward",
        "fa fa-foursquare" => "Foursquare",
        "fa fa-frown-o" => "Frown O",
        "fa fa-futbol-o" => "Futbol O",
        "fa fa-gamepad" => "Gamepad",
        "fa fa-gavel" => "Gavel",
        "fa fa-gbp" => "Gbp",
        "fa fa-ge" => "Ge",
        "fa fa-gear" => "Gear",
        "fa fa-gears" => "Gears",
        "fa fa-genderless" => "Genderless",
        "fa fa-get-pocket" => "Get Pocket",
        "fa fa-gg" => "Gg",
        "fa fa-gg-circle" => "Gg Circle",
        "fa fa-gift" => "Gift",
        "fa fa-git" => "Git",
        "fa fa-git-square" => "Git Square",
        "fa fa-github" => "Github",
        "fa fa-github-alt" => "Github Alt",
        "fa fa-github-square" => "Github Square",
        "fa fa-gittip" => "Gittip",
        "fa fa-glass" => "Glass",
        "fa fa-globe" => "Globe",
        "fa fa-google" => "Google",
        "fa fa-google-plus" => "Google Plus",
        "fa fa-google-plus-square" => "Google Plus Square",
        "fa fa-google-wallet" => "Google Wallet",
        "fa fa-graduation-cap" => "Graduation Cap",
        "fa fa-gratipay" => "Gratipay",
        "fa fa-group" => "Group",
        "fa fa-h-square" => "H Square",
        "fa fa-hacker-news" => "Hacker News",
        "fa fa-hand-grab-o" => "Hand Grab O",
        "fa fa-hand-lizard-o" => "Hand Lizard O",
        "fa fa-hand-o-down" => "Hand O Down",
        "fa fa-hand-o-left" => "Hand O Left",
        "fa fa-hand-o-right" => "Hand O Right",
        "fa fa-hand-o-up" => "Hand O Up",
        "fa fa-hand-paper-o" => "Hand Paper O",
        "fa fa-hand-peace-o" => "Hand Peace O",
        "fa fa-hand-pointer-o" => "Hand Pointer O",
        "fa fa-hand-rock-o" => "Hand Rock O",
        "fa fa-hand-scissors-o" => "Hand Scissors O",
        "fa fa-hand-spock-o" => "Hand Spock O",
        "fa fa-hand-stop-o" => "Hand Stop O",
        "fa fa-hashtag" => "Hashtag",
        "fa fa-hdd-o" => "Hdd O",
        "fa fa-header" => "Header",
        "fa fa-headphones" => "Headphones",
        "fa fa-heart" => "Heart",
        "fa fa-heart-o" => "Heart O",
        "fa fa-heartbeat" => "Heartbeat",
        "fa fa-history" => "History",
        "fa fa-home" => "Home",
        "fa fa-hospital-o" => "Hospital O",
        "fa fa-hotel" => "Hotel",
        "fa fa-hourglass" => "Hourglass",
        "fa fa-hourglass-1" => "Hourglass 1",
        "fa fa-hourglass-2" => "Hourglass 2",
        "fa fa-hourglass-3" => "Hourglass 3",
        "fa fa-hourglass-end" => "Hourglass End",
        "fa fa-hourglass-half" => "Hourglass Half",
        "fa fa-hourglass-o" => "Hourglass O",
        "fa fa-hourglass-start" => "Hourglass Start",
        "fa fa-houzz" => "Houzz",
        "fa fa-html5" => "Html5",
        "fa fa-i-cursor" => "I Cursor",
        "fa fa-ils" => "Ils",
        "fa fa-image" => "Image",
        "fa fa-inbox" => "Inbox",
        "fa fa-indent" => "Indent",
        "fa fa-industry" => "Industry",
        "fa fa-info" => "Info",
        "fa fa-info-circle" => "Info Circle",
        "fa fa-inr" => "Inr",
        "fa fa-instagram" => "Instagram",
        "fa fa-institution" => "Institution",
        "fa fa-internet-explorer" => "Internet Explorer",
        "fa fa-intersex" => "Intersex",
        "fa fa-ioxhost" => "Ioxhost",
        "fa fa-italic" => "Italic",
        "fa fa-joomla" => "Joomla",
        "fa fa-jpy" => "Jpy",
        "fa fa-jsfiddle" => "Jsfiddle",
        "fa fa-key" => "Key",
        "fa fa-keyboard-o" => "Keyboard O",
        "fa fa-krw" => "Krw",
        "fa fa-language" => "Language",
        "fa fa-laptop" => "Laptop",
        "fa fa-lastfm" => "Lastfm",
        "fa fa-lastfm-square" => "Lastfm Square",
        "fa fa-leaf" => "Leaf",
        "fa fa-leanpub" => "Leanpub",
        "fa fa-legal" => "Legal",
        "fa fa-lemon-o" => "Lemon O",
        "fa fa-level-down" => "Level Down",
        "fa fa-level-up" => "Level Up",
        "fa fa-life-bouy" => "Life Bouy",
        "fa fa-life-buoy" => "Life Buoy",
        "fa fa-life-ring" => "Life Ring",
        "fa fa-life-saver" => "Life Saver",
        "fa fa-lightbulb-o" => "Lightbulb O",
        "fa fa-line-chart" => "Line Chart",
        "fa fa-link" => "Link",
        "fa fa-linkedin" => "Linkedin",
        "fa fa-linkedin-square" => "Linkedin Square",
        "fa fa-linux" => "Linux",
        "fa fa-list" => "List",
        "fa fa-list-alt" => "List Alt",
        "fa fa-list-ol" => "List Ol",
        "fa fa-list-ul" => "List Ul",
        "fa fa-location-arrow" => "Location Arrow",
        "fa fa-lock" => "Lock",
        "fa fa-long-arrow-down" => "Long Arrow Down",
        "fa fa-long-arrow-left" => "Long Arrow Left",
        "fa fa-long-arrow-right" => "Long Arrow Right",
        "fa fa-long-arrow-up" => "Long Arrow Up",
        "fa fa-magic" => "Magic",
        "fa fa-magnet" => "Magnet",
        "fa fa-mail-forward" => "Mail Forward",
        "fa fa-mail-reply" => "Mail Reply",
        "fa fa-mail-reply-all" => "Mail Reply All",
        "fa fa-male" => "Male",
        "fa fa-map" => "Map",
        "fa fa-map-marker" => "Map Marker",
        "fa fa-map-o" => "Map O",
        "fa fa-map-pin" => "Map Pin",
        "fa fa-map-signs" => "Map Signs",
        "fa fa-mars" => "Mars",
        "fa fa-mars-double" => "Mars Double",
        "fa fa-mars-stroke" => "Mars Stroke",
        "fa fa-mars-stroke-h" => "Mars Stroke H",
        "fa fa-mars-stroke-v" => "Mars Stroke V",
        "fa fa-maxcdn" => "Maxcdn",
        "fa fa-meanpath" => "Meanpath",
        "fa fa-medium" => "Medium",
        "fa fa-medkit" => "Medkit",
        "fa fa-meh-o" => "Meh O",
        "fa fa-mercury" => "Mercury",
        "fa fa-microphone" => "Microphone",
        "fa fa-microphone-slash" => "Microphone Slash",
        "fa fa-minus" => "Minus",
        "fa fa-minus-circle" => "Minus Circle",
        "fa fa-minus-square" => "Minus Square",
        "fa fa-minus-square-o" => "Minus Square O",
        "fa fa-mixcloud" => "Mixcloud",
        "fa fa-mobile" => "Mobile",
        "fa fa-mobile-phone" => "Mobile Phone",
        "fa fa-modx" => "Modx",
        "fa fa-money" => "Money",
        "fa fa-moon-o" => "Moon O",
        "fa fa-mortar-board" => "Mortar Board",
        "fa fa-motorcycle" => "Motorcycle",
        "fa fa-mouse-pointer" => "Mouse Pointer",
        "fa fa-music" => "Music",
        "fa fa-navicon" => "Navicon",
        "fa fa-neuter" => "Neuter",
        "fa fa-newspaper-o" => "Newspaper O",
        "fa fa-object-group" => "Object Group",
        "fa fa-object-ungroup" => "Object Ungroup",
        "fa fa-odnoklassniki" => "Odnoklassniki",
        "fa fa-odnoklassniki-square" => "Odnoklassniki Square",
        "fa fa-opencart" => "Opencart",
        "fa fa-openid" => "Openid",
        "fa fa-opera" => "Opera",
        "fa fa-optin-monster" => "Optin Monster",
        "fa fa-outdent" => "Outdent",
        "fa fa-pagelines" => "Pagelines",
        "fa fa-paint-brush" => "Paint Brush",
        "fa fa-paper-plane" => "Paper Plane",
        "fa fa-paper-plane-o" => "Paper Plane O",
        "fa fa-paperclip" => "Paperclip",
        "fa fa-paragraph" => "Paragraph",
        "fa fa-paste" => "Paste",
        "fa fa-pause" => "Pause",
        "fa fa-pause-circle" => "Pause Circle",
        "fa fa-pause-circle-o" => "Pause Circle O",
        "fa fa-paw" => "Paw",
        "fa fa-paypal" => "Paypal",
        "fa fa-pencil" => "Pencil",
        "fa fa-pencil-square" => "Pencil Square",
        "fa fa-pencil-square-o" => "Pencil Square O",
        "fa fa-percent" => "Percent",
        "fa fa-phone" => "Phone",
        "fa fa-phone-square" => "Phone Square",
        "fa fa-photo" => "Photo",
        "fa fa-picture-o" => "Picture O",
        "fa fa-pie-chart" => "Pie Chart",
        "fa fa-pied-piper" => "Pied Piper",
        "fa fa-pied-piper-alt" => "Pied Piper Alt",
        "fa fa-pinterest" => "Pinterest",
        "fa fa-pinterest-p" => "Pinterest P",
        "fa fa-pinterest-square" => "Pinterest Square",
        "fa fa-plane" => "Plane",
        "fa fa-play" => "Play",
        "fa fa-play-circle" => "Play Circle",
        "fa fa-play-circle-o" => "Play Circle O",
        "fa fa-plug" => "Plug",
        "fa fa-plus" => "Plus",
        "fa fa-plus-circle" => "Plus Circle",
        "fa fa-plus-square" => "Plus Square",
        "fa fa-plus-square-o" => "Plus Square O",
        "fa fa-power-off" => "Power Off",
        "fa fa-print" => "Print",
        "fa fa-product-hunt" => "Product Hunt",
        "fa fa-puzzle-piece" => "Puzzle Piece",
        "fa fa-qq" => "Qq",
        "fa fa-qrcode" => "Qrcode",
        "fa fa-question" => "Question",
        "fa fa-question-circle" => "Question Circle",
        "fa fa-quote-left" => "Quote Left",
        "fa fa-quote-right" => "Quote Right",
        "fa fa-ra" => "Ra",
        "fa fa-random" => "Random",
        "fa fa-rebel" => "Rebel",
        "fa fa-recycle" => "Recycle",
        "fa fa-reddit" => "Reddit",
        "fa fa-reddit-alien" => "Reddit Alien",
        "fa fa-reddit-square" => "Reddit Square",
        "fa fa-refresh" => "Refresh",
        "fa fa-registered" => "Registered",
        "fa fa-remove" => "Remove",
        "fa fa-renren" => "Renren",
        "fa fa-reorder" => "Reorder",
        "fa fa-repeat" => "Repeat",
        "fa fa-reply" => "Reply",
        "fa fa-reply-all" => "Reply All",
        "fa fa-retweet" => "Retweet",
        "fa fa-rmb" => "Rmb",
        "fa fa-road" => "Road",
        "fa fa-rocket" => "Rocket",
        "fa fa-rotate-left" => "Rotate Left",
        "fa fa-rotate-right" => "Rotate Right",
        "fa fa-rouble" => "Rouble",
        "fa fa-rss" => "Rss",
        "fa fa-rss-square" => "Rss Square",
        "fa fa-rub" => "Rub",
        "fa fa-ruble" => "Ruble",
        "fa fa-rupee" => "Rupee",
        "fa fa-safari" => "Safari",
        "fa fa-save" => "Save",
        "fa fa-scissors" => "Scissors",
        "fa fa-scribd" => "Scribd",
        "fa fa-search" => "Search",
        "fa fa-search-minus" => "Search Minus",
        "fa fa-search-plus" => "Search Plus",
        "fa fa-sellsy" => "Sellsy",
        "fa fa-send" => "Send",
        "fa fa-send-o" => "Send O",
        "fa fa-server" => "Server",
        "fa fa-share" => "Share",
        "fa fa-share-alt" => "Share Alt",
        "fa fa-share-alt-square" => "Share Alt Square",
        "fa fa-share-square" => "Share Square",
        "fa fa-share-square-o" => "Share Square O",
        "fa fa-shekel" => "Shekel",
        "fa fa-sheqel" => "Sheqel",
        "fa fa-shield" => "Shield",
        "fa fa-ship" => "Ship",
        "fa fa-shirtsinbulk" => "Shirtsinbulk",
        "fa fa-shopping-bag" => "Shopping Bag",
        "fa fa-shopping-basket" => "Shopping Basket",
        "fa fa-shopping-cart" => "Shopping Cart",
        "fa fa-sign-in" => "Sign In",
        "fa fa-sign-out" => "Sign Out",
        "fa fa-signal" => "Signal",
        "fa fa-simplybuilt" => "Simplybuilt",
        "fa fa-sitemap" => "Sitemap",
        "fa fa-skyatlas" => "Skyatlas",
        "fa fa-skype" => "Skype",
        "fa fa-slack" => "Slack",
        "fa fa-sliders" => "Sliders",
        "fa fa-slideshare" => "Slideshare",
        "fa fa-smile-o" => "Smile O",
        "fa fa-soccer-ball-o" => "Soccer Ball O",
        "fa fa-sort" => "Sort",
        "fa fa-sort-alpha-asc" => "Sort Alpha Asc",
        "fa fa-sort-alpha-desc" => "Sort Alpha Desc",
        "fa fa-sort-amount-asc" => "Sort Amount Asc",
        "fa fa-sort-amount-desc" => "Sort Amount Desc",
        "fa fa-sort-asc" => "Sort Asc",
        "fa fa-sort-desc" => "Sort Desc",
        "fa fa-sort-down" => "Sort Down",
        "fa fa-sort-numeric-asc" => "Sort Numeric Asc",
        "fa fa-sort-numeric-desc" => "Sort Numeric Desc",
        "fa fa-sort-up" => "Sort Up",
        "fa fa-soundcloud" => "Soundcloud",
        "fa fa-space-shuttle" => "Space Shuttle",
        "fa fa-spinner" => "Spinner",
        "fa fa-spoon" => "Spoon",
        "fa fa-spotify" => "Spotify",
        "fa fa-square" => "Square",
        "fa fa-square-o" => "Square O",
        "fa fa-stack-exchange" => "Stack Exchange",
        "fa fa-stack-overflow" => "Stack Overflow",
        "fa fa-star" => "Star",
        "fa fa-star-half" => "Star Half",
        "fa fa-star-half-empty" => "Star Half Empty",
        "fa fa-star-half-full" => "Star Half Full",
        "fa fa-star-half-o" => "Star Half O",
        "fa fa-star-o" => "Star O",
        "fa fa-steam" => "Steam",
        "fa fa-steam-square" => "Steam Square",
        "fa fa-step-backward" => "Step Backward",
        "fa fa-step-forward" => "Step Forward",
        "fa fa-stethoscope" => "Stethoscope",
        "fa fa-sticky-note" => "Sticky Note",
        "fa fa-sticky-note-o" => "Sticky Note O",
        "fa fa-stop" => "Stop",
        "fa fa-stop-circle" => "Stop Circle",
        "fa fa-stop-circle-o" => "Stop Circle O",
        "fa fa-street-view" => "Street View",
        "fa fa-strikethrough" => "Strikethrough",
        "fa fa-stumbleupon" => "Stumbleupon",
        "fa fa-stumbleupon-circle" => "Stumbleupon Circle",
        "fa fa-subscript" => "Subscript",
        "fa fa-subway" => "Subway",
        "fa fa-suitcase" => "Suitcase",
        "fa fa-sun-o" => "Sun O",
        "fa fa-superscript" => "Superscript",
        "fa fa-support" => "Support",
        "fa fa-table" => "Table",
        "fa fa-tablet" => "Tablet",
        "fa fa-tachometer" => "Tachometer",
        "fa fa-tag" => "Tag",
        "fa fa-tags" => "Tags",
        "fa fa-tasks" => "Tasks",
        "fa fa-taxi" => "Taxi",
        "fa fa-television" => "Television",
        "fa fa-tencent-weibo" => "Tencent Weibo",
        "fa fa-terminal" => "Terminal",
        "fa fa-text-height" => "Text Height",
        "fa fa-text-width" => "Text Width",
        "fa fa-th" => "Th",
        "fa fa-th-large" => "Th Large",
        "fa fa-th-list" => "Th List",
        "fa fa-thumb-tack" => "Thumb Tack",
        "fa fa-thumbs-down" => "Thumbs Down",
        "fa fa-thumbs-o-down" => "Thumbs O Down",
        "fa fa-thumbs-o-up" => "Thumbs O Up",
        "fa fa-thumbs-up" => "Thumbs Up",
        "fa fa-ticket" => "Ticket",
        "fa fa-times" => "Times",
        "fa fa-times-circle" => "Times Circle",
        "fa fa-times-circle-o" => "Times Circle O",
        "fa fa-tint" => "Tint",
        "fa fa-toggle-down" => "Toggle Down",
        "fa fa-toggle-left" => "Toggle Left",
        "fa fa-toggle-off" => "Toggle Off",
        "fa fa-toggle-on" => "Toggle On",
        "fa fa-toggle-right" => "Toggle Right",
        "fa fa-toggle-up" => "Toggle Up",
        "fa fa-trademark" => "Trademark",
        "fa fa-train" => "Train",
        "fa fa-transgender" => "Transgender",
        "fa fa-transgender-alt" => "Transgender Alt",
        "fa fa-trash" => "Trash",
        "fa fa-trash-o" => "Trash O",
        "fa fa-tree" => "Tree",
        "fa fa-trello" => "Trello",
        "fa fa-tripadvisor" => "Tripadvisor",
        "fa fa-trophy" => "Trophy",
        "fa fa-truck" => "Truck",
        "fa fa-try" => "Try",
        "fa fa-tty" => "Tty",
        "fa fa-tumblr" => "Tumblr",
        "fa fa-tumblr-square" => "Tumblr Square",
        "fa fa-turkish-lira" => "Turkish Lira",
        "fa fa-tv" => "Tv",
        "fa fa-twitch" => "Twitch",
        "fa fa-twitter" => "Twitter",
        "fa fa-twitter-square" => "Twitter Square",
        "fa fa-umbrella" => "Umbrella",
        "fa fa-underline" => "Underline",
        "fa fa-undo" => "Undo",
        "fa fa-university" => "University",
        "fa fa-unlink" => "Unlink",
        "fa fa-unlock" => "Unlock",
        "fa fa-unlock-alt" => "Unlock Alt",
        "fa fa-unsorted" => "Unsorted",
        "fa fa-upload" => "Upload",
        "fa fa-usb" => "Usb",
        "fa fa-usd" => "Usd",
        "fa fa-user" => "User",
        "fa fa-user-md" => "User Md",
        "fa fa-user-plus" => "User Plus",
        "fa fa-user-secret" => "User Secret",
        "fa fa-user-times" => "User Times",
        "fa fa-users" => "Users",
        "fa fa-venus" => "Venus",
        "fa fa-venus-double" => "Venus Double",
        "fa fa-venus-mars" => "Venus Mars",
        "fa fa-viacoin" => "Viacoin",
        "fa fa-video-camera" => "Video Camera",
        "fa fa-vimeo" => "Vimeo",
        "fa fa-vimeo-square" => "Vimeo Square",
        "fa fa-vine" => "Vine",
        "fa fa-vk" => "Vk",
        "fa fa-volume-down" => "Volume Down",
        "fa fa-volume-off" => "Volume Off",
        "fa fa-volume-up" => "Volume Up",
        "fa fa-warning" => "Warning",
        "fa fa-wechat" => "Wechat",
        "fa fa-weibo" => "Weibo",
        "fa fa-weixin" => "Weixin",
        "fa fa-whatsapp" => "Whatsapp",
        "fa fa-wheelchair" => "Wheelchair",
        "fa fa-wifi" => "Wifi",
        "fa fa-wikipedia-w" => "Wikipedia W",
        "fa fa-windows" => "Windows",
        "fa fa-won" => "Won",
        "fa fa-wordpress" => "WordPress",
        "fa fa-wrench" => "Wrench",
        "fa fa-xing" => "Xing",
        "fa fa-xing-square" => "Xing Square",
        "fa fa-y-combinator" => "Y Combinator",
        "fa fa-y-combinator-square" => "Y Combinator Square",
        "fa fa-yahoo" => "Yahoo",
        "fa fa-yc" => "Yc",
        "fa fa-yc-square" => "Yc Square",
        "fa fa-yelp" => "Yelp",
        "fa fa-yen" => "Yen",
        "fa fa-youtube" => "Youtube",
        "fa fa-youtube-play" => "Youtube Play",
        "fa fa-youtube-square" => "Youtube Square"
    );

    return apply_filters('pearl_fontawesome_list', $fontawesome);
}

/**
 * @return mixed|void
 */
function pearl_get_fw()
{
    $fw = array(
        '' => esc_html__('Select font-weight', 'pearl'),
        '900' => '900',
        '800' => esc_html__('Bolder (800)', 'pearl'),
        '700' => esc_html__('Bold (700)', 'pearl'),
        '600' => esc_html__('Semi-Bold (600)', 'pearl'),
        '500' => esc_html__('Medium (500)', 'pearl'),
        '400' => esc_html__('Normal (400)', 'pearl'),
        '300' => '300',
        '200' => esc_html__('Light', 'pearl'),
        '100' => '100'
    );

    return apply_filters('pearl_get_subsets', $fw);
}

/**
 * @return array
 */
function pearl_google_fonts_array()
{

    $gfonts = array(
        'ABeeZee' => array(
            'label' => 'ABeeZee',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Abel' => array(
            'label' => 'Abel',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Abril Fatface' => array(
            'label' => 'Abril Fatface',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Aclonica' => array(
            'label' => 'Aclonica',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Acme' => array(
            'label' => 'Acme',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Actor' => array(
            'label' => 'Actor',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Adamina' => array(
            'label' => 'Adamina',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Advent Pro' => array(
            'label' => 'Advent Pro',
            'variants' => array('100', '200', '300', 'regular', '500', '600', '700',),
            'subsets' => array('latin', 'greek', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Aguafina Script' => array(
            'label' => 'Aguafina Script',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Akronim' => array(
            'label' => 'Akronim',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Aladin' => array(
            'label' => 'Aladin',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Aldrich' => array(
            'label' => 'Aldrich',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Alef' => array(
            'label' => 'Alef',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Alegreya' => array(
            'label' => 'Alegreya',
            'variants' => array('regular', 'italic', '700', '700italic', '900', '900italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Alegreya SC' => array(
            'label' => 'Alegreya SC',
            'variants' => array('regular', 'italic', '700', '700italic', '900', '900italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Alegreya Sans' => array(
            'label' => 'Alegreya Sans',
            'variants' => array(
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '500',
                '500italic',
                '700',
                '700italic',
                '800',
                '800italic',
                '900',
                '900italic',
            ),
            'subsets' => array('vietnamese', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Alegreya Sans SC' => array(
            'label' => 'Alegreya Sans SC',
            'variants' => array(
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '500',
                '500italic',
                '700',
                '700italic',
                '800',
                '800italic',
                '900',
                '900italic',
            ),
            'subsets' => array('vietnamese', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Alex Brush' => array(
            'label' => 'Alex Brush',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Alfa Slab One' => array(
            'label' => 'Alfa Slab One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Alice' => array(
            'label' => 'Alice',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Alike' => array(
            'label' => 'Alike',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Alike Angular' => array(
            'label' => 'Alike Angular',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Allan' => array(
            'label' => 'Allan',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Allerta' => array(
            'label' => 'Allerta',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Allerta Stencil' => array(
            'label' => 'Allerta Stencil',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Allura' => array(
            'label' => 'Allura',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Almendra' => array(
            'label' => 'Almendra',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Almendra Display' => array(
            'label' => 'Almendra Display',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Almendra SC' => array(
            'label' => 'Almendra SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Amarante' => array(
            'label' => 'Amarante',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Amaranth' => array(
            'label' => 'Amaranth',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Amatic SC' => array(
            'label' => 'Amatic SC',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Amethysta' => array(
            'label' => 'Amethysta',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Anaheim' => array(
            'label' => 'Anaheim',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Andada' => array(
            'label' => 'Andada',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Andika' => array(
            'label' => 'Andika',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Angkor' => array(
            'label' => 'Angkor',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Annie Use Your Telescope' => array(
            'label' => 'Annie Use Your Telescope',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Anonymous Pro' => array(
            'label' => 'Anonymous Pro',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'greek', 'latin-ext',),
            'category' => 'monospace',
        ),
        'Antic' => array(
            'label' => 'Antic',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Antic Didone' => array(
            'label' => 'Antic Didone',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Antic Slab' => array(
            'label' => 'Antic Slab',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Anton' => array(
            'label' => 'Anton',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Arapey' => array(
            'label' => 'Arapey',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Arbutus' => array(
            'label' => 'Arbutus',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Arbutus Slab' => array(
            'label' => 'Arbutus Slab',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Architects Daughter' => array(
            'label' => 'Architects Daughter',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Archivo Black' => array(
            'label' => 'Archivo Black',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Archivo Narrow' => array(
            'label' => 'Archivo Narrow',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Arimo' => array(
            'label' => 'Arimo',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array(
                'cyrillic',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'sans-serif',
        ),
        'Arizonia' => array(
            'label' => 'Arizonia',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Armata' => array(
            'label' => 'Armata',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Artifika' => array(
            'label' => 'Artifika',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Arvo' => array(
            'label' => 'Arvo',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Asap' => array(
            'label' => 'Asap',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Asset' => array(
            'label' => 'Asset',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Astloch' => array(
            'label' => 'Astloch',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Asul' => array(
            'label' => 'Asul',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Atomic Age' => array(
            'label' => 'Atomic Age',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Aubrey' => array(
            'label' => 'Aubrey',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Audiowide' => array(
            'label' => 'Audiowide',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Autour One' => array(
            'label' => 'Autour One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Average' => array(
            'label' => 'Average',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Average Sans' => array(
            'label' => 'Average Sans',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Averia Gruesa Libre' => array(
            'label' => 'Averia Gruesa Libre',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Averia Libre' => array(
            'label' => 'Averia Libre',
            'variants' => array('300', '300italic', 'regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Averia Sans Libre' => array(
            'label' => 'Averia Sans Libre',
            'variants' => array('300', '300italic', 'regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Averia Serif Libre' => array(
            'label' => 'Averia Serif Libre',
            'variants' => array('300', '300italic', 'regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Bad Script' => array(
            'label' => 'Bad Script',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin',),
            'category' => 'handwriting',
        ),
        'Balthazar' => array(
            'label' => 'Balthazar',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Bangers' => array(
            'label' => 'Bangers',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Basic' => array(
            'label' => 'Basic',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Barlow' => array(
            'label' => 'Barlow',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Barlow Condensed' => array(
            'label' => 'Barlow Condensed',
            'variants' => array('400', '700'),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Battambang' => array(
            'label' => 'Battambang',
            'variants' => array('regular', '700',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Baumans' => array(
            'label' => 'Baumans',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Bayon' => array(
            'label' => 'Bayon',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Belgrano' => array(
            'label' => 'Belgrano',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Belleza' => array(
            'label' => 'Belleza',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'BenchNine' => array(
            'label' => 'BenchNine',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Bentham' => array(
            'label' => 'Bentham',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Berkshire Swash' => array(
            'label' => 'Berkshire Swash',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Bevan' => array(
            'label' => 'Bevan',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Bigelow Rules' => array(
            'label' => 'Bigelow Rules',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Bigshot One' => array(
            'label' => 'Bigshot One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Bilbo' => array(
            'label' => 'Bilbo',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Bilbo Swash Caps' => array(
            'label' => 'Bilbo Swash Caps',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Bitter' => array(
            'label' => 'Bitter',
            'variants' => array('regular', 'italic', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Black Ops One' => array(
            'label' => 'Black Ops One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Bokor' => array(
            'label' => 'Bokor',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Bonbon' => array(
            'label' => 'Bonbon',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Boogaloo' => array(
            'label' => 'Boogaloo',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Bowlby One' => array(
            'label' => 'Bowlby One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Bowlby One SC' => array(
            'label' => 'Bowlby One SC',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Brawler' => array(
            'label' => 'Brawler',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Bree Serif' => array(
            'label' => 'Bree Serif',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Bubblegum Sans' => array(
            'label' => 'Bubblegum Sans',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Bubbler One' => array(
            'label' => 'Bubbler One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Buda' => array(
            'label' => 'Buda',
            'variants' => array('300',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Buenard' => array(
            'label' => 'Buenard',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Butcherman' => array(
            'label' => 'Butcherman',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Butterfly Kids' => array(
            'label' => 'Butterfly Kids',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Cabin' => array(
            'label' => 'Cabin',
            'variants' => array('regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Cabin Condensed' => array(
            'label' => 'Cabin Condensed',
            'variants' => array('regular', '500', '600', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Cabin Sketch' => array(
            'label' => 'Cabin Sketch',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Caesar Dressing' => array(
            'label' => 'Caesar Dressing',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Cagliostro' => array(
            'label' => 'Cagliostro',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Calligraffitti' => array(
            'label' => 'Calligraffitti',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Cambo' => array(
            'label' => 'Cambo',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Candal' => array(
            'label' => 'Candal',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Cantarell' => array(
            'label' => 'Cantarell',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Cantata One' => array(
            'label' => 'Cantata One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Cantora One' => array(
            'label' => 'Cantora One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Capriola' => array(
            'label' => 'Capriola',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Cardo' => array(
            'label' => 'Cardo',
            'variants' => array('regular', 'italic', '700',),
            'subsets' => array('greek-ext', 'latin', 'greek', 'latin-ext',),
            'category' => 'serif',
        ),
        'Cairo' => array(
            'label' => 'Cairo',
            'variants' => array('200', '300', '400', '500', '600', '700', '900',),
            'subsets' => array('arabic', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Carme' => array(
            'label' => 'Carme',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Carrois Gothic' => array(
            'label' => 'Carrois Gothic',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Carrois Gothic SC' => array(
            'label' => 'Carrois Gothic SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Carter One' => array(
            'label' => 'Carter One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Caudex' => array(
            'label' => 'Caudex',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('greek-ext', 'latin', 'greek', 'latin-ext',),
            'category' => 'serif',
        ),
        'Cedarville Cursive' => array(
            'label' => 'Cedarville Cursive',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Ceviche One' => array(
            'label' => 'Ceviche One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Changa One' => array(
            'label' => 'Changa One',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Chango' => array(
            'label' => 'Chango',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Chau Philomene One' => array(
            'label' => 'Chau Philomene One',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Chela One' => array(
            'label' => 'Chela One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Chelsea Market' => array(
            'label' => 'Chelsea Market',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Chenla' => array(
            'label' => 'Chenla',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Cherry Cream Soda' => array(
            'label' => 'Cherry Cream Soda',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Cherry Swash' => array(
            'label' => 'Cherry Swash',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Chewy' => array(
            'label' => 'Chewy',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Chicle' => array(
            'label' => 'Chicle',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Chivo' => array(
            'label' => 'Chivo',
            'variants' => array('regular', 'italic', '900', '900italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Cinzel' => array(
            'label' => 'Cinzel',
            'variants' => array('regular', '700', '900',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Cinzel Decorative' => array(
            'label' => 'Cinzel Decorative',
            'variants' => array('regular', '700', '900',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Clicker Script' => array(
            'label' => 'Clicker Script',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Coda' => array(
            'label' => 'Coda',
            'variants' => array('regular', '800',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Coda Caption' => array(
            'label' => 'Coda Caption',
            'variants' => array('800',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Codystar' => array(
            'label' => 'Codystar',
            'variants' => array('300', 'regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Combo' => array(
            'label' => 'Combo',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Comfortaa' => array(
            'label' => 'Comfortaa',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'display',
        ),
        'Coming Soon' => array(
            'label' => 'Coming Soon',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Concert One' => array(
            'label' => 'Concert One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Condiment' => array(
            'label' => 'Condiment',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Content' => array(
            'label' => 'Content',
            'variants' => array('regular', '700',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Contrail One' => array(
            'label' => 'Contrail One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Convergence' => array(
            'label' => 'Convergence',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Cookie' => array(
            'label' => 'Cookie',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Copse' => array(
            'label' => 'Copse',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Corben' => array(
            'label' => 'Corben',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Courgette' => array(
            'label' => 'Courgette',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Cousine' => array(
            'label' => 'Cousine',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array(
                'cyrillic',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'monospace',
        ),
        'Coustard' => array(
            'label' => 'Coustard',
            'variants' => array('regular', '900',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Covered By Your Grace' => array(
            'label' => 'Covered By Your Grace',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Crafty Girls' => array(
            'label' => 'Crafty Girls',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Creepster' => array(
            'label' => 'Creepster',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Crete Round' => array(
            'label' => 'Crete Round',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Crimson Text' => array(
            'label' => 'Crimson Text',
            'variants' => array('regular', 'italic', '600', '600italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Croissant One' => array(
            'label' => 'Croissant One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Crushed' => array(
            'label' => 'Crushed',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Cuprum' => array(
            'label' => 'Cuprum',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Cutive' => array(
            'label' => 'Cutive',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Cutive Mono' => array(
            'label' => 'Cutive Mono',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'monospace',
        ),
        'Damion' => array(
            'label' => 'Damion',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Dancing Script' => array(
            'label' => 'Dancing Script',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Dangrek' => array(
            'label' => 'Dangrek',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Dawning of a New Day' => array(
            'label' => 'Dawning of a New Day',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Days One' => array(
            'label' => 'Days One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Delius' => array(
            'label' => 'Delius',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Delius Swash Caps' => array(
            'label' => 'Delius Swash Caps',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Delius Unicase' => array(
            'label' => 'Delius Unicase',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Della Respira' => array(
            'label' => 'Della Respira',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Denk One' => array(
            'label' => 'Denk One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Devonshire' => array(
            'label' => 'Devonshire',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Dhurjati' => array(
            'label' => 'Dhurjati',
            'variants' => array('regular',),
            'subsets' => array('telugu', 'latin',),
            'category' => 'sans-serif',
        ),
        'Didact Gothic' => array(
            'label' => 'Didact Gothic',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'greek-ext', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'sans-serif',
        ),

        'Diplomata' => array(
            'label' => 'Diplomata',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Diplomata SC' => array(
            'label' => 'Diplomata SC',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Domine' => array(
            'label' => 'Domine',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Donegal One' => array(
            'label' => 'Donegal One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Doppio One' => array(
            'label' => 'Doppio One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Dorsa' => array(
            'label' => 'Dorsa',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Dosis' => array(
            'label' => 'Dosis',
            'variants' => array('200', '300', 'regular', '500', '600', '700', '800',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Dr Sugiyama' => array(
            'label' => 'Dr Sugiyama',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Droid Sans' => array(
            'label' => 'Droid Sans',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Droid Sans Mono' => array(
            'label' => 'Droid Sans Mono',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'monospace',
        ),
        'Droid Serif' => array(
            'label' => 'Droid Serif',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Duru Sans' => array(
            'label' => 'Duru Sans',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Dynalight' => array(
            'label' => 'Dynalight',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'EB Garamond' => array(
            'label' => 'EB Garamond',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'vietnamese', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'serif',
        ),
        'Eagle Lake' => array(
            'label' => 'Eagle Lake',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Eater' => array(
            'label' => 'Eater',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Economica' => array(
            'label' => 'Economica',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Ek Mukta' => array(
            'label' => 'Ek Mukta',
            'variants' => array('200', '300', 'regular', '500', '600', '700', '800',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Electrolize' => array(
            'label' => 'Electrolize',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Elsie' => array(
            'label' => 'Elsie',
            'variants' => array('regular', '900',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Elsie Swash Caps' => array(
            'label' => 'Elsie Swash Caps',
            'variants' => array('regular', '900',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Emblema One' => array(
            'label' => 'Emblema One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Emilys Candy' => array(
            'label' => 'Emilys Candy',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Encode Sans Expanded' => array(
            'label' => 'Encode Sans Expanded',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Engagement' => array(
            'label' => 'Engagement',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Englebert' => array(
            'label' => 'Englebert',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Enriqueta' => array(
            'label' => 'Enriqueta',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Erica One' => array(
            'label' => 'Erica One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Esteban' => array(
            'label' => 'Esteban',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Euphoria Script' => array(
            'label' => 'Euphoria Script',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Ewert' => array(
            'label' => 'Ewert',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Exo' => array(
            'label' => 'Exo',
            'variants' => array(
                '100',
                '100italic',
                '200',
                '200italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '500',
                '500italic',
                '600',
                '600italic',
                '700',
                '700italic',
                '800',
                '800italic',
                '900',
                '900italic',
            ),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Exo 2' => array(
            'label' => 'Exo 2',
            'variants' => array(
                '100',
                '100italic',
                '200',
                '200italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '500',
                '500italic',
                '600',
                '600italic',
                '700',
                '700italic',
                '800',
                '800italic',
                '900',
                '900italic',
            ),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Expletus Sans' => array(
            'label' => 'Expletus Sans',
            'variants' => array('regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Fanwood Text' => array(
            'label' => 'Fanwood Text',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Fascinate' => array(
            'label' => 'Fascinate',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Fascinate Inline' => array(
            'label' => 'Fascinate Inline',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Faster One' => array(
            'label' => 'Faster One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Fasthand' => array(
            'label' => 'Fasthand',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'serif',
        ),
        'Fauna One' => array(
            'label' => 'Fauna One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Federant' => array(
            'label' => 'Federant',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Federo' => array(
            'label' => 'Federo',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Felipa' => array(
            'label' => 'Felipa',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Fenix' => array(
            'label' => 'Fenix',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Finger Paint' => array(
            'label' => 'Finger Paint',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Fira Mono' => array(
            'label' => 'Fira Mono',
            'variants' => array('regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'monospace',
        ),
        'Fira Sans' => array(
            'label' => 'Fira Sans',
            'variants' => array('300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Fjalla One' => array(
            'label' => 'Fjalla One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Fjord One' => array(
            'label' => 'Fjord One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Flamenco' => array(
            'label' => 'Flamenco',
            'variants' => array('300', 'regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Flavors' => array(
            'label' => 'Flavors',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Fondamento' => array(
            'label' => 'Fondamento',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Fontdiner Swanky' => array(
            'label' => 'Fontdiner Swanky',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Forum' => array(
            'label' => 'Forum',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'display',
        ),
        'Francois One' => array(
            'label' => 'Francois One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Freckle Face' => array(
            'label' => 'Freckle Face',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Fredericka the Great' => array(
            'label' => 'Fredericka the Great',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Fredoka One' => array(
            'label' => 'Fredoka One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Freehand' => array(
            'label' => 'Freehand',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Fresca' => array(
            'label' => 'Fresca',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Frijole' => array(
            'label' => 'Frijole',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Fruktur' => array(
            'label' => 'Fruktur',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Fugaz One' => array(
            'label' => 'Fugaz One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'GFS Didot' => array(
            'label' => 'GFS Didot',
            'variants' => array('regular',),
            'subsets' => array('greek',),
            'category' => 'serif',
        ),
        'GFS Neohellenic' => array(
            'label' => 'GFS Neohellenic',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('greek',),
            'category' => 'sans-serif',
        ),
        'Gabriela' => array(
            'label' => 'Gabriela',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Gafata' => array(
            'label' => 'Gafata',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Galdeano' => array(
            'label' => 'Galdeano',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Galindo' => array(
            'label' => 'Galindo',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Gentium Basic' => array(
            'label' => 'Gentium Basic',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Gentium Book Basic' => array(
            'label' => 'Gentium Book Basic',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Geo' => array(
            'label' => 'Geo',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Geostar' => array(
            'label' => 'Geostar',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Geostar Fill' => array(
            'label' => 'Geostar Fill',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Germania One' => array(
            'label' => 'Germania One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Gidugu' => array(
            'label' => 'Gidugu',
            'variants' => array('regular',),
            'subsets' => array('telugu', 'latin',),
            'category' => 'sans-serif',
        ),
        'Gilda Display' => array(
            'label' => 'Gilda Display',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Give You Glory' => array(
            'label' => 'Give You Glory',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Glass Antiqua' => array(
            'label' => 'Glass Antiqua',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Glegoo' => array(
            'label' => 'Glegoo',
            'variants' => array('regular', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Gloria Hallelujah' => array(
            'label' => 'Gloria Hallelujah',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Goblin One' => array(
            'label' => 'Goblin One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Gochi Hand' => array(
            'label' => 'Gochi Hand',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Gorditas' => array(
            'label' => 'Gorditas',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Goudy Bookletter 1911' => array(
            'label' => 'Goudy Bookletter 1911',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Graduate' => array(
            'label' => 'Graduate',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Grand Hotel' => array(
            'label' => 'Grand Hotel',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Gravitas One' => array(
            'label' => 'Gravitas One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Great Vibes' => array(
            'label' => 'Great Vibes',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Griffy' => array(
            'label' => 'Griffy',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Gruppo' => array(
            'label' => 'Gruppo',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Gudea' => array(
            'label' => 'Gudea',
            'variants' => array('regular', 'italic', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Habibi' => array(
            'label' => 'Habibi',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Halant' => array(
            'label' => 'Halant',
            'variants' => array('300', 'regular', '500', '600', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Hammersmith One' => array(
            'label' => 'Hammersmith One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Hanalei' => array(
            'label' => 'Hanalei',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Hanalei Fill' => array(
            'label' => 'Hanalei Fill',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Handlee' => array(
            'label' => 'Handlee',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Hanuman' => array(
            'label' => 'Hanuman',
            'variants' => array('regular', '700',),
            'subsets' => array('khmer',),
            'category' => 'serif',
        ),
        'Happy Monkey' => array(
            'label' => 'Happy Monkey',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Headland One' => array(
            'label' => 'Headland One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Henny Penny' => array(
            'label' => 'Henny Penny',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Herr Von Muellerhoff' => array(
            'label' => 'Herr Von Muellerhoff',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Hind' => array(
            'label' => 'Hind',
            'variants' => array('300', 'regular', '500', '600', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Holtwood One SC' => array(
            'label' => 'Holtwood One SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Homemade Apple' => array(
            'label' => 'Homemade Apple',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Homenaje' => array(
            'label' => 'Homenaje',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'IM Fell DW Pica' => array(
            'label' => 'IM Fell DW Pica',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell DW Pica SC' => array(
            'label' => 'IM Fell DW Pica SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell Double Pica' => array(
            'label' => 'IM Fell Double Pica',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell Double Pica SC' => array(
            'label' => 'IM Fell Double Pica SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell English' => array(
            'label' => 'IM Fell English',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell English SC' => array(
            'label' => 'IM Fell English SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell French Canon' => array(
            'label' => 'IM Fell French Canon',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell French Canon SC' => array(
            'label' => 'IM Fell French Canon SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell Great Primer' => array(
            'label' => 'IM Fell Great Primer',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'IM Fell Great Primer SC' => array(
            'label' => 'IM Fell Great Primer SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Iceberg' => array(
            'label' => 'Iceberg',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Iceland' => array(
            'label' => 'Iceland',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Imprima' => array(
            'label' => 'Imprima',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Inconsolata' => array(
            'label' => 'Inconsolata',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'monospace',
        ),
        'Inder' => array(
            'label' => 'Inder',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Indie Flower' => array(
            'label' => 'Indie Flower',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Inika' => array(
            'label' => 'Inika',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Irish Grover' => array(
            'label' => 'Irish Grover',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Istok Web' => array(
            'label' => 'Istok Web',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Italiana' => array(
            'label' => 'Italiana',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Italianno' => array(
            'label' => 'Italianno',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Jacques Francois' => array(
            'label' => 'Jacques Francois',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Jacques Francois Shadow' => array(
            'label' => 'Jacques Francois Shadow',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Jim Nightshade' => array(
            'label' => 'Jim Nightshade',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Jockey One' => array(
            'label' => 'Jockey One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Jolly Lodger' => array(
            'label' => 'Jolly Lodger',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Josefin Sans' => array(
            'label' => 'Josefin Sans',
            'variants' => array(
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
            ),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Josefin Slab' => array(
            'label' => 'Josefin Slab',
            'variants' => array(
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
            ),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Joti One' => array(
            'label' => 'Joti One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Judson' => array(
            'label' => 'Judson',
            'variants' => array('regular', 'italic', '700',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Julee' => array(
            'label' => 'Julee',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Julius Sans One' => array(
            'label' => 'Julius Sans One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Junge' => array(
            'label' => 'Junge',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Jura' => array(
            'label' => 'Jura',
            'variants' => array('300', 'regular', '500', '600',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Just Another Hand' => array(
            'label' => 'Just Another Hand',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Just Me Again Down Here' => array(
            'label' => 'Just Me Again Down Here',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Kalam' => array(
            'label' => 'Kalam',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Kameron' => array(
            'label' => 'Kameron',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Kantumruy' => array(
            'label' => 'Kantumruy',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('khmer',),
            'category' => 'sans-serif',
        ),
        'Karla' => array(
            'label' => 'Karla',
            'variants' => array('regular', 'italic', '400', '500', '600',  '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Karma' => array(
            'label' => 'Karma',
            'variants' => array('300', 'regular', '500', '600', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Kaushan Script' => array(
            'label' => 'Kaushan Script',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Kavoon' => array(
            'label' => 'Kavoon',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Kdam Thmor' => array(
            'label' => 'Kdam Thmor',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Keania One' => array(
            'label' => 'Keania One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Kelly Slab' => array(
            'label' => 'Kelly Slab',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Kenia' => array(
            'label' => 'Kenia',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Khand' => array(
            'label' => 'Khand',
            'variants' => array('300', 'regular', '500', '600', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Khmer' => array(
            'label' => 'Khmer',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Kite One' => array(
            'label' => 'Kite One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Knewave' => array(
            'label' => 'Knewave',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Kotta One' => array(
            'label' => 'Kotta One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Koulen' => array(
            'label' => 'Koulen',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Kranky' => array(
            'label' => 'Kranky',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Kreon' => array(
            'label' => 'Kreon',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Kristi' => array(
            'label' => 'Kristi',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Krona One' => array(
            'label' => 'Krona One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'La Belle Aurore' => array(
            'label' => 'La Belle Aurore',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Laila' => array(
            'label' => 'Laila',
            'variants' => array('300', 'regular', '500', '600', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Lancelot' => array(
            'label' => 'Lancelot',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Lato' => array(
            'label' => 'Lato',
            'variants' => array(
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'League Script' => array(
            'label' => 'League Script',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Leckerli One' => array(
            'label' => 'Leckerli One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Ledger' => array(
            'label' => 'Ledger',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Lekton' => array(
            'label' => 'Lekton',
            'variants' => array('regular', 'italic', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Lemon' => array(
            'label' => 'Lemon',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Libre Baskerville' => array(
            'label' => 'Libre Baskerville',
            'variants' => array('regular', 'italic', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Life Savers' => array(
            'label' => 'Life Savers',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Lilita One' => array(
            'label' => 'Lilita One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Lily Script One' => array(
            'label' => 'Lily Script One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Limelight' => array(
            'label' => 'Limelight',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Linden Hill' => array(
            'label' => 'Linden Hill',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Lobster' => array(
            'label' => 'Lobster',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Lobster Two' => array(
            'label' => 'Lobster Two',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Londrina Outline' => array(
            'label' => 'Londrina Outline',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Londrina Shadow' => array(
            'label' => 'Londrina Shadow',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Londrina Sketch' => array(
            'label' => 'Londrina Sketch',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Londrina Solid' => array(
            'label' => 'Londrina Solid',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Lora' => array(
            'label' => 'Lora',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Love Ya Like A Sister' => array(
            'label' => 'Love Ya Like A Sister',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Loved by the King' => array(
            'label' => 'Loved by the King',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Lovers Quarrel' => array(
            'label' => 'Lovers Quarrel',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Luckiest Guy' => array(
            'label' => 'Luckiest Guy',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Lusitana' => array(
            'label' => 'Lusitana',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Lustria' => array(
            'label' => 'Lustria',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Macondo' => array(
            'label' => 'Macondo',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Macondo Swash Caps' => array(
            'label' => 'Macondo Swash Caps',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Magra' => array(
            'label' => 'Magra',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Maiden Orange' => array(
            'label' => 'Maiden Orange',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Mako' => array(
            'label' => 'Mako',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Mallanna' => array(
            'label' => 'Mallanna',
            'variants' => array('regular',),
            'subsets' => array('telugu', 'latin',),
            'category' => 'sans-serif',
        ),
        'Mandali' => array(
            'label' => 'Mandali',
            'variants' => array('regular',),
            'subsets' => array('telugu', 'latin',),
            'category' => 'sans-serif',
        ),
        'Marcellus' => array(
            'label' => 'Marcellus',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Marcellus SC' => array(
            'label' => 'Marcellus SC',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Marck Script' => array(
            'label' => 'Marck Script',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Margarine' => array(
            'label' => 'Margarine',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Marko One' => array(
            'label' => 'Marko One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Marmelad' => array(
            'label' => 'Marmelad',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Marvel' => array(
            'label' => 'Marvel',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Mate' => array(
            'label' => 'Mate',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Mate SC' => array(
            'label' => 'Mate SC',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Maven Pro' => array(
            'label' => 'Maven Pro',
            'variants' => array('regular', '500', '700', '900',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'McLaren' => array(
            'label' => 'McLaren',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Meddon' => array(
            'label' => 'Meddon',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'MedievalSharp' => array(
            'label' => 'MedievalSharp',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Medula One' => array(
            'label' => 'Medula One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Megrim' => array(
            'label' => 'Megrim',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Meie Script' => array(
            'label' => 'Meie Script',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Merienda' => array(
            'label' => 'Merienda',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Merienda One' => array(
            'label' => 'Merienda One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Merriweather' => array(
            'label' => 'Merriweather',
            'variants' => array('300', '300italic', 'regular', 'italic', '700', '700italic', '900', '900italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Merriweather Sans' => array(
            'label' => 'Merriweather Sans',
            'variants' => array('300', '300italic', 'regular', 'italic', '700', '700italic', '800', '800italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Metal' => array(
            'label' => 'Metal',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Metal Mania' => array(
            'label' => 'Metal Mania',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Metamorphous' => array(
            'label' => 'Metamorphous',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Metrophobic' => array(
            'label' => 'Metrophobic',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Michroma' => array(
            'label' => 'Michroma',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Milonga' => array(
            'label' => 'Milonga',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Miltonian' => array(
            'label' => 'Miltonian',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Miltonian Tattoo' => array(
            'label' => 'Miltonian Tattoo',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Miniver' => array(
            'label' => 'Miniver',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Miss Fajardose' => array(
            'label' => 'Miss Fajardose',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Modern Antiqua' => array(
            'label' => 'Modern Antiqua',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Molengo' => array(
            'label' => 'Molengo',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Molle' => array(
            'label' => 'Molle',
            'variants' => array('italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Monda' => array(
            'label' => 'Monda',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Monofett' => array(
            'label' => 'Monofett',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Monoton' => array(
            'label' => 'Monoton',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Monsieur La Doulaise' => array(
            'label' => 'Monsieur La Doulaise',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Montaga' => array(
            'label' => 'Montaga',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Montez' => array(
            'label' => 'Montez',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Montserrat' => array(
            'label' => 'Montserrat',
            'variants' => array('100', '200', '300', '400', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Montserrat Alternates' => array(
            'label' => 'Montserrat Alternates',
            'variants' => array('100', '400', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Montserrat Subrayada' => array(
            'label' => 'Montserrat Subrayada',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Moul' => array(
            'label' => 'Moul',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Moulpali' => array(
            'label' => 'Moulpali',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Mountains of Christmas' => array(
            'label' => 'Mountains of Christmas',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Mouse Memoirs' => array(
            'label' => 'Mouse Memoirs',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Mr Bedfort' => array(
            'label' => 'Mr Bedfort',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Mr Dafoe' => array(
            'label' => 'Mr Dafoe',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Mr De Haviland' => array(
            'label' => 'Mr De Haviland',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Mrs Saint Delafield' => array(
            'label' => 'Mrs Saint Delafield',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Mrs Sheppards' => array(
            'label' => 'Mrs Sheppards',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Muli' => array(
            'label' => 'Muli',
            'variants' => array('300', '300italic', 'regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Mystery Quest' => array(
            'label' => 'Mystery Quest',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'NTR' => array(
            'label' => 'NTR',
            'variants' => array('regular',),
            'subsets' => array('telugu', 'latin',),
            'category' => 'sans-serif',
        ),
        'Neucha' => array(
            'label' => 'Neucha',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin',),
            'category' => 'handwriting',
        ),
        'Neuton' => array(
            'label' => 'Neuton',
            'variants' => array('200', '300', 'regular', 'italic', '700', '800',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'New Rocker' => array(
            'label' => 'New Rocker',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'News Cycle' => array(
            'label' => 'News Cycle',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Niconne' => array(
            'label' => 'Niconne',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Nixie One' => array(
            'label' => 'Nixie One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Nobile' => array(
            'label' => 'Nobile',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Nokora' => array(
            'label' => 'Nokora',
            'variants' => array('regular', '700',),
            'subsets' => array('khmer',),
            'category' => 'serif',
        ),
        'Norican' => array(
            'label' => 'Norican',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Nosifer' => array(
            'label' => 'Nosifer',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Nothing You Could Do' => array(
            'label' => 'Nothing You Could Do',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Noticia Text' => array(
            'label' => 'Noticia Text',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('vietnamese', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Noto Sans' => array(
            'label' => 'Noto Sans',
            'variants' => array('regular', 'italic','500', '700', '700italic',),
            'subsets' => array(
                'cyrillic',
                'devanagari',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'sans-serif',
        ),
        'Noto Serif' => array(
            'label' => 'Noto Serif',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array(
                'cyrillic',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'serif',
        ),
        'Nova Cut' => array(
            'label' => 'Nova Cut',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Nova Flat' => array(
            'label' => 'Nova Flat',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Nova Mono' => array(
            'label' => 'Nova Mono',
            'variants' => array('regular',),
            'subsets' => array('latin', 'greek',),
            'category' => 'monospace',
        ),
        'Nova Oval' => array(
            'label' => 'Nova Oval',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Nova Round' => array(
            'label' => 'Nova Round',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Nova Script' => array(
            'label' => 'Nova Script',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Nova Slim' => array(
            'label' => 'Nova Slim',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Nova Square' => array(
            'label' => 'Nova Square',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Numans' => array(
            'label' => 'Numans',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Nunito' => array(
            'label' => 'Nunito',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Nunito Sans' => array(
            'label' => 'Nunito Sans',
            'variants' => array('300', 'regular', '600', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Odor Mean Chey' => array(
            'label' => 'Odor Mean Chey',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Offside' => array(
            'label' => 'Offside',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Old Standard TT' => array(
            'label' => 'Old Standard TT',
            'variants' => array('regular', 'italic', '700',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Oldenburg' => array(
            'label' => 'Oldenburg',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Oleo Script' => array(
            'label' => 'Oleo Script',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Oleo Script Swash Caps' => array(
            'label' => 'Oleo Script Swash Caps',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Open Sans' => array(
            'label' => 'Open Sans',
            'variants' => array(
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
                '800',
                '800italic',
            ),
            'subsets' => array(
                'cyrillic',
                'devanagari',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'sans-serif',
        ),
        'Open Sans Condensed' => array(
            'label' => 'Open Sans Condensed',
            'variants' => array('300', '300italic', '700',),
            'subsets' => array(
                'cyrillic',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'sans-serif',
        ),
        'Oranienbaum' => array(
            'label' => 'Oranienbaum',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'serif',
        ),
        'Orbitron' => array(
            'label' => 'Orbitron',
            'variants' => array('regular', '500', '700', '900',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Oregano' => array(
            'label' => 'Oregano',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Orienta' => array(
            'label' => 'Orienta',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Original Surfer' => array(
            'label' => 'Original Surfer',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Oswald' => array(
            'label' => 'Oswald',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Over the Rainbow' => array(
            'label' => 'Over the Rainbow',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Overlock' => array(
            'label' => 'Overlock',
            'variants' => array('regular', 'italic', '700', '700italic', '900', '900italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Overlock SC' => array(
            'label' => 'Overlock SC',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Ovo' => array(
            'label' => 'Ovo',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Oxygen' => array(
            'label' => 'Oxygen',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Oxygen Mono' => array(
            'label' => 'Oxygen Mono',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'monospace',
        ),
        'PT Mono' => array(
            'label' => 'PT Mono',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'monospace',
        ),
        'PT Sans' => array(
            'label' => 'PT Sans',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'PT Sans Caption' => array(
            'label' => 'PT Sans Caption',
            'variants' => array('regular', '700',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'PT Sans Narrow' => array(
            'label' => 'PT Sans Narrow',
            'variants' => array('regular', '700',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'PT Serif' => array(
            'label' => 'PT Serif',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'serif',
        ),
        'PT Serif Caption' => array(
            'label' => 'PT Serif Caption',
            'variants' => array('regular', 'italic',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'latin-ext',),
            'category' => 'serif',
        ),
        'Pacifico' => array(
            'label' => 'Pacifico',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Paprika' => array(
            'label' => 'Paprika',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Parisienne' => array(
            'label' => 'Parisienne',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Passero One' => array(
            'label' => 'Passero One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Passion One' => array(
            'label' => 'Passion One',
            'variants' => array('regular', '700', '900',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Pathway Gothic One' => array(
            'label' => 'Pathway Gothic One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Patrick Hand' => array(
            'label' => 'Patrick Hand',
            'variants' => array('regular',),
            'subsets' => array('vietnamese', 'latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Patrick Hand SC' => array(
            'label' => 'Patrick Hand SC',
            'variants' => array('regular',),
            'subsets' => array('vietnamese', 'latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Patua One' => array(
            'label' => 'Patua One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Paytone One' => array(
            'label' => 'Paytone One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Peralta' => array(
            'label' => 'Peralta',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Permanent Marker' => array(
            'label' => 'Permanent Marker',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Petit Formal Script' => array(
            'label' => 'Petit Formal Script',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Petrona' => array(
            'label' => 'Petrona',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Philosopher' => array(
            'label' => 'Philosopher',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin',),
            'category' => 'sans-serif',
        ),
        'Piedra' => array(
            'label' => 'Piedra',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Pinyon Script' => array(
            'label' => 'Pinyon Script',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Pirata One' => array(
            'label' => 'Pirata One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Plaster' => array(
            'label' => 'Plaster',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Play' => array(
            'label' => 'Play',
            'variants' => array('regular', '700',),
            'subsets' => array('cyrillic', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Playball' => array(
            'label' => 'Playball',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Playfair Display' => array(
            'label' => 'Playfair Display',
            'variants' => array('regular', 'italic', '700', '700italic', '900', '900italic',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Playfair Display SC' => array(
            'label' => 'Playfair Display SC',
            'variants' => array('regular', 'italic', '700', '700italic', '900', '900italic',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Podkova' => array(
            'label' => 'Podkova',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Poiret One' => array(
            'label' => 'Poiret One',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Poller One' => array(
            'label' => 'Poller One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Poly' => array(
            'label' => 'Poly',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Pompiere' => array(
            'label' => 'Pompiere',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Pontano Sans' => array(
            'label' => 'Pontano Sans',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Poppins' => array(
            'label' => 'Poppins',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Port Lligat Sans' => array(
            'label' => 'Port Lligat Sans',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Port Lligat Slab' => array(
            'label' => 'Port Lligat Slab',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Prata' => array(
            'label' => 'Prata',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Preahvihear' => array(
            'label' => 'Preahvihear',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Press Start 2P' => array(
            'label' => 'Press Start 2P',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'greek', 'latin-ext',),
            'category' => 'display',
        ),
        'Princess Sofia' => array(
            'label' => 'Princess Sofia',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Prociono' => array(
            'label' => 'Prociono',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Prosto One' => array(
            'label' => 'Prosto One',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Puritan' => array(
            'label' => 'Puritan',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Purple Purse' => array(
            'label' => 'Purple Purse',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Quando' => array(
            'label' => 'Quando',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Quantico' => array(
            'label' => 'Quantico',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Quattrocento' => array(
            'label' => 'Quattrocento',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Quattrocento Sans' => array(
            'label' => 'Quattrocento Sans',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Questrial' => array(
            'label' => 'Questrial',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Quicksand' => array(
            'label' => 'Quicksand',
            'variants' => array('300', 'regular', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Quintessential' => array(
            'label' => 'Quintessential',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Qwigley' => array(
            'label' => 'Qwigley',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Racing Sans One' => array(
            'label' => 'Racing Sans One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Radley' => array(
            'label' => 'Radley',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Rajdhani' => array(
            'label' => 'Rajdhani',
            'variants' => array('300', 'regular', '500', '600', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Raleway' => array(
            'label' => 'Raleway',
            'variants' => array('100', '200', '300', 'regular', '500', '600', '700', '800', '900',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Raleway Dots' => array(
            'label' => 'Raleway Dots',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Ramabhadra' => array(
            'label' => 'Ramabhadra',
            'variants' => array('regular',),
            'subsets' => array('telugu', 'latin',),
            'category' => 'sans-serif',
        ),
        'Rambla' => array(
            'label' => 'Rambla',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Rammetto One' => array(
            'label' => 'Rammetto One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Ranchers' => array(
            'label' => 'Ranchers',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Rancho' => array(
            'label' => 'Rancho',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Rationale' => array(
            'label' => 'Rationale',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Redressed' => array(
            'label' => 'Redressed',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Reenie Beanie' => array(
            'label' => 'Reenie Beanie',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Revalia' => array(
            'label' => 'Revalia',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Ribeye' => array(
            'label' => 'Ribeye',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Ribeye Marrow' => array(
            'label' => 'Ribeye Marrow',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Righteous' => array(
            'label' => 'Righteous',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Risque' => array(
            'label' => 'Risque',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Roboto' => array(
            'label' => 'Roboto',
            'variants' => array(
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '500',
                '500italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ),
            'subsets' => array(
                'cyrillic',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'sans-serif',
        ),
        'Roboto Condensed' => array(
            'label' => 'Roboto Condensed',
            'variants' => array('300', '300italic', 'regular', 'italic', '700', '700italic',),
            'subsets' => array(
                'cyrillic',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'sans-serif',
        ),
        'Roboto Slab' => array(
            'label' => 'Roboto Slab',
            'variants' => array('100', '300', 'regular', '700',),
            'subsets' => array(
                'cyrillic',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'serif',
        ),
        'Rochester' => array(
            'label' => 'Rochester',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Rock Salt' => array(
            'label' => 'Rock Salt',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Rokkitt' => array(
            'label' => 'Rokkitt',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Romanesco' => array(
            'label' => 'Romanesco',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Ropa Sans' => array(
            'label' => 'Ropa Sans',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Rosario' => array(
            'label' => 'Rosario',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Rosarivo' => array(
            'label' => 'Rosarivo',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Rouge Script' => array(
            'label' => 'Rouge Script',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Rozha One' => array(
            'label' => 'Rozha One',
            'variants' => array('regular',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Rubik Mono One' => array(
            'label' => 'Rubik Mono One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Rubik' => array(
            'label' => 'Rubik One',
            'variants' => array('300, 400, 500, 600, 700, 900',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Ruda' => array(
            'label' => 'Ruda',
            'variants' => array('regular', '700', '900',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Rufina' => array(
            'label' => 'Rufina',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Ruge Boogie' => array(
            'label' => 'Ruge Boogie',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Ruluko' => array(
            'label' => 'Ruluko',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Rum Raisin' => array(
            'label' => 'Rum Raisin',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Ruslan Display' => array(
            'label' => 'Ruslan Display',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Russo One' => array(
            'label' => 'Russo One',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Ruthie' => array(
            'label' => 'Ruthie',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Rye' => array(
            'label' => 'Rye',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Sacramento' => array(
            'label' => 'Sacramento',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Sail' => array(
            'label' => 'Sail',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Saira' => array(
            'label' => 'Saira',
            'variants' => array('300', '400', '500', '600', '700', '800',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Salsa' => array(
            'label' => 'Salsa',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Sanchez' => array(
            'label' => 'Sanchez',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Sancreek' => array(
            'label' => 'Sancreek',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Sansita One' => array(
            'label' => 'Sansita One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Sarina' => array(
            'label' => 'Sarina',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Sarpanch' => array(
            'label' => 'Sarpanch',
            'variants' => array('regular', '500', '600', '700', '800', '900',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Satisfy' => array(
            'label' => 'Satisfy',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Scada' => array(
            'label' => 'Scada',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Schoolbell' => array(
            'label' => 'Schoolbell',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Seaweed Script' => array(
            'label' => 'Seaweed Script',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Sevillana' => array(
            'label' => 'Sevillana',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Seymour One' => array(
            'label' => 'Seymour One',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Shadows Into Light' => array(
            'label' => 'Shadows Into Light',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Shadows Into Light Two' => array(
            'label' => 'Shadows Into Light Two',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Shanti' => array(
            'label' => 'Shanti',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Share' => array(
            'label' => 'Share',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Share Tech' => array(
            'label' => 'Share Tech',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Share Tech Mono' => array(
            'label' => 'Share Tech Mono',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'monospace',
        ),
        'Shojumaru' => array(
            'label' => 'Shojumaru',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Short Stack' => array(
            'label' => 'Short Stack',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Siemreap' => array(
            'label' => 'Siemreap',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Sigmar One' => array(
            'label' => 'Sigmar One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Signika' => array(
            'label' => 'Signika',
            'variants' => array('300', 'regular', '600', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Signika Negative' => array(
            'label' => 'Signika Negative',
            'variants' => array('300', 'regular', '600', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Simonetta' => array(
            'label' => 'Simonetta',
            'variants' => array('regular', 'italic', '900', '900italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Sintony' => array(
            'label' => 'Sintony',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Sirin Stencil' => array(
            'label' => 'Sirin Stencil',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Six Caps' => array(
            'label' => 'Six Caps',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Skranji' => array(
            'label' => 'Skranji',
            'variants' => array('regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Slabo 13px' => array(
            'label' => 'Slabo 13px',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Slabo 27px' => array(
            'label' => 'Slabo 27px',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Slackey' => array(
            'label' => 'Slackey',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Smokum' => array(
            'label' => 'Smokum',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Smythe' => array(
            'label' => 'Smythe',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Sniglet' => array(
            'label' => 'Sniglet',
            'variants' => array('regular', '800',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Snippet' => array(
            'label' => 'Snippet',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Snowburst One' => array(
            'label' => 'Snowburst One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Sofadi One' => array(
            'label' => 'Sofadi One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Sofia' => array(
            'label' => 'Sofia',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Sonsie One' => array(
            'label' => 'Sonsie One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Sorts Mill Goudy' => array(
            'label' => 'Sorts Mill Goudy',
            'variants' => array('regular', 'italic',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Source Code Pro' => array(
            'label' => 'Source Code Pro',
            'variants' => array('200', '300', 'regular', '500', '600', '700', '900',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'monospace',
        ),
        'Source Sans Pro' => array(
            'label' => 'Source Sans Pro',
            'variants' => array(
                '200',
                '200italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ),
            'subsets' => array('vietnamese', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Source Serif Pro' => array(
            'label' => 'Source Serif Pro',
            'variants' => array('regular', '600', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Special Elite' => array(
            'label' => 'Special Elite',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Spicy Rice' => array(
            'label' => 'Spicy Rice',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Spinnaker' => array(
            'label' => 'Spinnaker',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Spirax' => array(
            'label' => 'Spirax',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Squada One' => array(
            'label' => 'Squada One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Stalemate' => array(
            'label' => 'Stalemate',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'handwriting',
        ),
        'Stalinist One' => array(
            'label' => 'Stalinist One',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Stardos Stencil' => array(
            'label' => 'Stardos Stencil',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Stint Ultra Condensed' => array(
            'label' => 'Stint Ultra Condensed',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Stint Ultra Expanded' => array(
            'label' => 'Stint Ultra Expanded',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Stoke' => array(
            'label' => 'Stoke',
            'variants' => array('300', 'regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Strait' => array(
            'label' => 'Strait',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Sue Ellen Francisco' => array(
            'label' => 'Sue Ellen Francisco',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Sunshiney' => array(
            'label' => 'Sunshiney',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Supermercado One' => array(
            'label' => 'Supermercado One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Suwannaphum' => array(
            'label' => 'Suwannaphum',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Swanky and Moo Moo' => array(
            'label' => 'Swanky and Moo Moo',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Syncopate' => array(
            'label' => 'Syncopate',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Tangerine' => array(
            'label' => 'Tangerine',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Taprom' => array(
            'label' => 'Taprom',
            'variants' => array('regular',),
            'subsets' => array('khmer',),
            'category' => 'display',
        ),
        'Tauri' => array(
            'label' => 'Tauri',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Teko' => array(
            'label' => 'Teko',
            'variants' => array('300', 'regular', '500', '600', '700',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Telex' => array(
            'label' => 'Telex',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Tenor Sans' => array(
            'label' => 'Tenor Sans',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Text Me One' => array(
            'label' => 'Text Me One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'The Girl Next Door' => array(
            'label' => 'The Girl Next Door',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Tienne' => array(
            'label' => 'Tienne',
            'variants' => array('regular', '700', '900',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Tinos' => array(
            'label' => 'Tinos',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array(
                'cyrillic',
                'vietnamese',
                'greek-ext',
                'latin',
                'cyrillic-ext',
                'greek',
                'latin-ext',
            ),
            'category' => 'serif',
        ),
        'Titan One' => array(
            'label' => 'Titan One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Titillium Web' => array(
            'label' => 'Titillium Web',
            'variants' => array(
                '200',
                '200italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
                '900',
            ),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Trade Winds' => array(
            'label' => 'Trade Winds',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Trocchi' => array(
            'label' => 'Trocchi',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Trochut' => array(
            'label' => 'Trochut',
            'variants' => array('regular', 'italic', '700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Trykker' => array(
            'label' => 'Trykker',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Tulpen One' => array(
            'label' => 'Tulpen One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Ubuntu' => array(
            'label' => 'Ubuntu',
            'variants' => array('300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'greek-ext', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Ubuntu Condensed' => array(
            'label' => 'Ubuntu Condensed',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'greek-ext', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Ubuntu Mono' => array(
            'label' => 'Ubuntu Mono',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('cyrillic', 'greek-ext', 'latin', 'cyrillic-ext', 'greek', 'latin-ext',),
            'category' => 'monospace',
        ),
        'Ultra' => array(
            'label' => 'Ultra',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Uncial Antiqua' => array(
            'label' => 'Uncial Antiqua',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Underdog' => array(
            'label' => 'Underdog',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Unica One' => array(
            'label' => 'Unica One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'UnifrakturCook' => array(
            'label' => 'UnifrakturCook',
            'variants' => array('700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'UnifrakturMaguntia' => array(
            'label' => 'UnifrakturMaguntia',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Unkempt' => array(
            'label' => 'Unkempt',
            'variants' => array('regular', '700',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Unlock' => array(
            'label' => 'Unlock',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Unna' => array(
            'label' => 'Unna',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'VT323' => array(
            'label' => 'VT323',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'monospace',
        ),
        'Vampiro One' => array(
            'label' => 'Vampiro One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Varela' => array(
            'label' => 'Varela',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Varela Round' => array(
            'label' => 'Varela Round',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Vast Shadow' => array(
            'label' => 'Vast Shadow',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Vesper Libre' => array(
            'label' => 'Vesper Libre',
            'variants' => array('regular', '500', '700', '900',),
            'subsets' => array('devanagari', 'latin', 'latin-ext',),
            'category' => 'serif',
        ),
        'Vibur' => array(
            'label' => 'Vibur',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Vidaloka' => array(
            'label' => 'Vidaloka',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Viga' => array(
            'label' => 'Viga',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Voces' => array(
            'label' => 'Voces',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Volkhov' => array(
            'label' => 'Volkhov',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Vollkorn' => array(
            'label' => 'Vollkorn',
            'variants' => array('regular', 'italic', '700', '700italic',),
            'subsets' => array('latin',),
            'category' => 'serif',
        ),
        'Voltaire' => array(
            'label' => 'Voltaire',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Waiting for the Sunrise' => array(
            'label' => 'Waiting for the Sunrise',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Wallpoet' => array(
            'label' => 'Wallpoet',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'display',
        ),
        'Walter Turncoat' => array(
            'label' => 'Walter Turncoat',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Warnes' => array(
            'label' => 'Warnes',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Wellfleet' => array(
            'label' => 'Wellfleet',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Wendy One' => array(
            'label' => 'Wendy One',
            'variants' => array('regular',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Wire One' => array(
            'label' => 'Wire One',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'sans-serif',
        ),
        'Yanone Kaffeesatz' => array(
            'label' => 'Yanone Kaffeesatz',
            'variants' => array('200', '300', 'regular', '700',),
            'subsets' => array('latin', 'latin-ext',),
            'category' => 'sans-serif',
        ),
        'Yellowtail' => array(
            'label' => 'Yellowtail',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Yeseva One' => array(
            'label' => 'Yeseva One',
            'variants' => array('regular',),
            'subsets' => array('cyrillic', 'latin', 'latin-ext',),
            'category' => 'display',
        ),
        'Yesteryear' => array(
            'label' => 'Yesteryear',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
        'Zeyada' => array(
            'label' => 'Zeyada',
            'variants' => array('regular',),
            'subsets' => array('latin',),
            'category' => 'handwriting',
        ),
    );

    $websafe = pearl_websafe_fonts();

    $fonts = $websafe + $gfonts;

    return apply_filters('pearl_google_fonts_array', $fonts);
}