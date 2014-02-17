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
define('DB_NAME', 'wp-katedavis');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'V<!m4eq@88Fl{?RSkL;niC##9A+GUkc}c*1J_1,N98_,).DR5go-JfWKhNVQ@3UT');
define('SECURE_AUTH_KEY',  'zyAn+:-Gr3lWt4[Lbo*OVJd+HfP@4)h?h8bRco4p&pU%$mb8z-T+wx-`cb59!q>D');
define('LOGGED_IN_KEY',    'Ue-QY!,,vyOJ5cKY6$s2pYIziO?Dib1^[N?7ql&a)(-GP].>YR|HR BN@,| d+8)');
define('NONCE_KEY',        '.s6P3~-|{_/fWH3<j+kGdl[O;yb._Mh,HL^-P._}x9,{:JJ+rPj=9-!zg+O J(Xq');
define('AUTH_SALT',        '|ar)27Qh(_%_a1J)!;RG5B9QYMs^L!@7{W0,eQ.`+]Sjck]@InOf7pA_@J~EY={M');
define('SECURE_AUTH_SALT', '(qE|n=IE*%:-hCg2,l%H8;xI6gslO9E(/_3*/zvr=x/R~xb-GG{|[W+c,3S6 zt!');
define('LOGGED_IN_SALT',   'O}O.DT,]?&1&2Q`E0RQoS#LKD!4$;4fvi=O-1?aoCad2YD`b=}mDWz#5)5Dt:/)d');
define('NONCE_SALT',       'hhg?|_:{SikU-Q2aWZ6A_j@sUhpyIj`v}Qt]R@3zGG|<Ldx=uvEM(b,loc +!1,L');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
