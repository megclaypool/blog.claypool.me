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
define('DB_NAME', 'blog_claypool_me_1');

/** MySQL database username */
define('DB_USER', 'blogclaypoolme1');

/** MySQL database password */
define('DB_PASSWORD', 'Py^udiDx');

/** MySQL hostname */
define('DB_HOST', 'mysql.blog.claypool.me');

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
define('AUTH_KEY',         ')$A)`zLFQ2w3gTr7xe7*F|fDgTS0X`Oa~g3XJ9r^w%J^ZPXuk2qH@/;6U6N+$`"u');
define('SECURE_AUTH_KEY',  '62Ls$DPN4P!z5Umc7ILcu:JURhAT#$ZqiGGl64V);OHwR/)"hUJ8"Q_DyLfBPG0^');
define('LOGGED_IN_KEY',    'I%_FGk@L$O$ud;PmR_D:BNa(FlvvR~?7+z48J*~w25JIJEIn`Uw7o|1LVog9Jo)v');
define('NONCE_KEY',        '8TGLXZt`j%I|~5P|"yv5e4qZ8EnelDnM~ZPn^tzJUHdQxQigT(z!Uo^$AtKgpk*"');
define('AUTH_SALT',        '@wOF);O"yK!Q;k#1L0#bQ@)nnA+g@Ma)DeEB:r0/RDb~h|)6Km~u&So8uVbI|s2K');
define('SECURE_AUTH_SALT', 'v?lx$)z4pNwoWiGBQ?q3uo#+w#MH$tLh:h~l?yRE+14pt@3@`99s&Fi1R3um_4ko');
define('LOGGED_IN_SALT',   'fxa`7O^8$gH$/@+k!;)uk!;*l+C!Z`GX!vyV"UCb$x4hA8E3NCGFfoEWxR7mK;Tt');
define('NONCE_SALT',       'z/4%98E`n2VI|u8_(;01Q`Ayrh3YqIt2P?8yJG*V?HFcK$+%_E|%Z(HlrjSvOhtN');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_yxm592_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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

