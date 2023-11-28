<?php
define('WP_POST_REVISIONS', false);
define( 'WP_CACHE', true ); // Added by WP Rocket
 define( 'WP_CACHE_KEY_SALT' , 'one.medicinesonline.org.uk' );

 // Added by WP Rocket

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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define( 'WPCACHEHOME', '/home/d2medicinesonlin/public_html/wp-content/plugins/wp-super-cache/');
define( 'DB_NAME', 'medonline_d2medicinesonlin_wp2' );

/** MySQL database username */
define( 'DB_USER', 'medonline_merged' );

/** MySQL database password */
define( 'DB_PASSWORD', '~*Wg5#~(8eQL' ); // N.15L24KRjsKRILuQnf91 ---- J.fNXeWeX2LELqNje6A07 //i^ckBN[0*WV[

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'vhh_0!Ec~NO/C_?2_-^3-,j&OSq O;h5{biui?(w=NNB+N1WT-+Tsm&/rB}+~+99');
define('SECURE_AUTH_KEY',  '(upH+s+$+<FyJYoXT=)CJQWU;3K)8rAOFTl?xY%ckbQmanC%M8PDr^#D#sqri8(s');
define('LOGGED_IN_KEY',    ',.285}dtd~lbs2+;8)So+1.I1@gjw;DA|B6|/Vw&SZU5LhEZcBu};%czaq$+Fw42');
define('NONCE_KEY',        'Kbd&6Wa0cNUAi6|,V (>n#%Bdgd)0g$t$|vkR2%nJc*/(3<N?OJIJ96^/i%$$j|;');
define('AUTH_SALT',        'BAA+EEg49F$Q|/OjrF@LyEE=TPZZ$09Gpc5)?y6:d%O*^okN+kPg,7-dgcyuy^jV');
define('SECURE_AUTH_SALT', ' o=ZfueGREM?zZ7.<}R.:W~]?--fL|UMo)7vEvJ^XNv^njl?ARSIZ(9+$ E*&V x');
define('LOGGED_IN_SALT',   '12u|`l>t4rI2VXg+$K}N|s/RJm1&wtPp~QI>p=6*O+7c)IEb9^NL?]XC[_*Y+;Km');
define('NONCE_SALT',       '1YPH55+mHwZm|2KOhVbX]ym-J8;BWTi.^j~v0b/k6v>ab1*0}M5M+pZX~q{)qn7F');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
 /** Disable the WP_CRON processes*/
define('DISABLE_WP_CRON', true);

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
define( 'WP_DEBUG_LOG', false);
ini_set('memory_limit','512M');
define('WP_MEMORY_LIMIT', '512M');



// Disable display of errors and warnings 
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0);

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', false );

// Place the line of code below in your wp-config.php file// Defining the constant as true will tell WordPress to stop executing its cron jobdefine('DISABLE_WP_CRON', true);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
