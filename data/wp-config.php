<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'WPNifu');

/** MySQL database username */
define('DB_USER', 'nifu');

/** MySQL database password */
define('DB_PASSWORD', 'ufin');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '3ucJ#r~|&dTz En+/D^vO)7/Z{/^jxL!XH~vU*~,NIn2c,}|RKkQvnNHssR#pFDK');
define('SECURE_AUTH_KEY',  'L+s@8|M&+h4]96y2*t}D:^/2rn:=Xw+@CnW*z)psa b|&I^.7X2V7&X{{/pZ.=(A');
define('LOGGED_IN_KEY',    '#j~QkmdxNLech{=s#!h20ap.K1cIu>fYz`#$SU#8+h%?ihp;<&5:5YZ{*6 wreGA');
define('NONCE_KEY',        '3syJ|jqa/=0MK7zJ5`1JN^*+[B&-c/!bvhGW|JkXY+KjLvJFN.!*4[l.{+yB#vxQ');
define('AUTH_SALT',        '_HTQY?G;LPQ`J{Z11:]HZ:sU2-X-l}4>i?G-J`CIR5{MFS!p|T*zI(WWZ=]![|N8');
define('SECURE_AUTH_SALT', 'A+}gX)d,:P&u0j8g,8@C )G66t#b|Jv@X5d@pSPa#zDV}3:mt)LCf]m(V#mRWFO|');
define('LOGGED_IN_SALT',   'r5@)(UGF($YDG8qrUw5Or5WTEI-xrW*$QFY0lF{/Fnc=xIkYmVtNYz;5E6l|zC-3');
define('NONCE_SALT',       'gQ+}KXNITnGo)m=XTC<+(VhUHHF_Y#PulpR/cY-VR=/hVel{5Y%=(L<!H<jKz#7|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_ALLOW_MULTISITE', true);

define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'nifu.dev.eyego.no' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

define( 'SUNRISE', 'on' );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
