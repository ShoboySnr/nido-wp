<?php
$layouts_to_path = STM_CONFIGURATIONS_PATH . '/importer/helpers/theme_options';

function stm_get_layout_options($layout)
{
	$options = call_user_func('stm_theme_options_' . $layout);
	$options = json_decode($options, true);
	$options['show_page_title'] = 'false';
	return $options;
}

require_once $layouts_to_path . '/business.php';
require_once $layouts_to_path . '/construction.php';
require_once $layouts_to_path . '/logistics.php';
require_once $layouts_to_path . '/beauty.php';
require_once $layouts_to_path . '/healthcoach.php';
require_once $layouts_to_path . '/medicall.php';
require_once $layouts_to_path . '/charity.php';
require_once $layouts_to_path . '/artist.php';
require_once $layouts_to_path . '/restaurant.php';
require_once $layouts_to_path . '/rental.php';
require_once $layouts_to_path . '/portfolio.php';
require_once $layouts_to_path . '/church.php';
require_once $layouts_to_path . '/store.php';
require_once $layouts_to_path . '/personal_blog.php';
require_once $layouts_to_path . '/startup.php';
require_once $layouts_to_path . '/viral.php';
require_once $layouts_to_path . '/magazine.php';
require_once $layouts_to_path . '/factory.php';
require_once $layouts_to_path . '/lawyer.php';
require_once $layouts_to_path . '/psychologist.php';
require_once $layouts_to_path . '/company.php';
require_once $layouts_to_path . '/corporate.php';
require_once $layouts_to_path . '/furniture.php';
require_once $layouts_to_path . '/renovation.php';
require_once $layouts_to_path . '/advisory.php';
require_once $layouts_to_path . '/digital.php';
require_once $layouts_to_path . '/politician.php';
require_once $layouts_to_path . '/finance.php';
require_once $layouts_to_path . '/creative.php';
require_once $layouts_to_path . '/dj.php';
require_once $layouts_to_path . '/businesstwo.php';
require_once $layouts_to_path . '/consulting.php';
require_once $layouts_to_path . '/creativetwo.php';
require_once $layouts_to_path . '/conference.php';
require_once $layouts_to_path . '/app.php';
require_once $layouts_to_path . '/businessthree.php';
require_once $layouts_to_path . '/seoagency.php';
require_once $layouts_to_path . '/portfoliotwo.php';
require_once $layouts_to_path . '/photographer.php';
require_once $layouts_to_path . '/businessfour.php';
require_once $layouts_to_path . '/medicaltwo.php';
require_once $layouts_to_path . '/constructiontwo.php';
require_once $layouts_to_path . '/logisticstwo.php';
require_once $layouts_to_path . '/software.php';
require_once $layouts_to_path . '/coffeeshop.php';
require_once $layouts_to_path . '/taxi.php';
require_once $layouts_to_path . '/sports_complex.php';
require_once $layouts_to_path . '/barbershop.php';
require_once $layouts_to_path . '/book.php';
require_once $layouts_to_path . '/hosting.php';
require_once $layouts_to_path . '/creativethree.php';
require_once $layouts_to_path . '/gym.php';
require_once $layouts_to_path . '/spa.php';
require_once $layouts_to_path . '/food.php';

