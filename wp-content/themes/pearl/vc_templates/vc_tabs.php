<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $interval
 * @var $el_class
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Tabs
 *
 * STM
 * @var $style
 */
$title = $interval = $el_class = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

pearl_add_element_style('tabs', $style);

wp_enqueue_script( 'jquery-ui-tabs' );

$el_class = $this->getExtraClass( $el_class );

$element = 'wpb_tabs';
if ( 'vc_tour' === $this->shortcode ) {
	$element = 'wpb_tour';
}

// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}
$tabs_nav = '';
$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix">';
foreach ( $tab_titles as $tab ) {
	$tab_atts = shortcode_parse_atts( $tab[0] );
	if ( isset( $tab_atts['title'] ) ) {
		$tabs_nav .= '<li><a href="#tab-' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : sanitize_title( $tab_atts['title'] ) ) . '">' . $tab_atts['title'] . '</a></li>';
	}
}
$tabs_nav .= '</ul>';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element ' . $el_class ), $this->settings['base'], $atts );

//STM css_class
$css_class .= ' .stm_tabs_' . $style;

if ( 'vc_tour' === $this->shortcode ) {
	$next_prev_nav = '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="' . esc_html__( 'Previous tab', 'pearl' ) . '">' . esc_html__( 'Next tab', 'pearl' ) . '">' . esc_html__( 'Next tab', 'pearl' ) . '</a></span></div>';
} else {
	$next_prev_nav = '';
}

$output = '
	<div class="' . $css_class . '" data-interval="' . $interval . '">
		<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">
			' . wpb_widget_title( array( 'title' => $title, 'extraclass' => $element . '_heading' ) )
	. $tabs_nav
	. wpb_js_remove_wpautop( $content )
	. $next_prev_nav . '
		</div>
	</div>
';

echo html_entity_decode($output);
