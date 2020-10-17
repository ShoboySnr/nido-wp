<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

function fromenv($key, $default = null) {
    $value = getenv($key);
    if ($value === false) {
        $value = $default;
    }
    return $value;
}

//$DSN = parse_url(fromenv('DATABASE_URL', 'mysql://root:root@localhost:8889/nido'));
 $DSN = parse_url(fromenv('DATABASE_URL', 'mysql://b36a530016322a:5de94b39@us-cdbr-east-02.cleardb.com/heroku_ac2c0f576fd97c8?reconnect=true'));

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', substr($DSN['path'], 1));

/** MySQL database username */
define('DB_USER', $DSN['user']);

/** MySQL database password */
define('DB_PASSWORD', $DSN['pass']);

/** MySQL hostname */
define('DB_HOST', $DSN['host']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wJ- r7c&Ts*6Jb!IdPHB}vQJ!Ek<Mw[A8WK1_xfY,Dr1- QohYm0UvF.PrF)W/*!' );
define( 'SECURE_AUTH_KEY',  'k(9*}zxj%ylH|pL<U XArD`ip@aKJRwFe.d|N-h7Uvv4/8#QWuq[3KMMHXdA/}/#' );
define( 'LOGGED_IN_KEY',    'e;W Oo5as~sO_A9&PA3L2j[4QQ$W6]$mOBIvT>:JrX]G)I2SMij`y^qX-.$EOb?z' );
define( 'NONCE_KEY',        'tIF.D!r<d$d/f*:gek,,~J=q5$ c$u=lrA{25@3pYU!]Q)]r6`8~ZQ]1&qbr)|E#' );
define( 'AUTH_SALT',        'H?jn_&*oLUzI}9]OuTuM<Xb%v)LOVF%Ez.GHp~/,.SK%YTgv@DIq~OaQ/8xCg@=X' );
define( 'SECURE_AUTH_SALT', 'KEhlZ:uW@]#2sKDK4;A].n4dCekK.DyZOY-bB4RP@+xC3xHQ!SA6L&sh1Svy(S,j' );
define( 'LOGGED_IN_SALT',   'NW_<t1a=kHH,mf8VK/;=g,4%f+ QIZ>C}<aYT?v,v|(BX0yu9!f_%o?U5(!iouqK' );
define( 'NONCE_SALT',       'u?ZZlE@[%iJ)iE2~:NPWJ>1ndfQeSab}RfjqVdQ:t7G9Zr3DhBpcPxOkb&P{jTPU' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
