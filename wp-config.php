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
define('DB_NAME', 'chris');

/** MySQL database username */
define('DB_USER', 'chris');

/** MySQL database password */
define('DB_PASSWORD', '5xLeHJQ4eYNVzP98');

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
define('AUTH_KEY',         'x9&VLW7u!qY%oyiIGT}d!G WA%LzEYXyQc/&#=`.X}5adbJSW{!Mb5DHKf(~N]qA');
define('SECURE_AUTH_KEY',  'trn:-#_^;[ep.>|j*2d|SGGBlTmsMYoBIpt8Flx)).|:Y(Mh!E$wwY)J8SKwIjmj');
define('LOGGED_IN_KEY',    'DU?=8w3>cg5nS4Fx/A8n3?$c>MZFE1jAuo(_Dj}hu1cs_%NRtqP|}EU(cR8Zihha');
define('NONCE_KEY',        'aP9e>bdxXs$P@#6+UuW4xl?48`JjWaelU Hq!Y{/PdFIo9sRjcD{<u_ fJS*Fwu0');
define('AUTH_SALT',        'I].ObX62n)F4cf xS%ph[XZn@(qgyB,Us67H((Jh_K(Kx4Ugh*(&=ueA!^1tU{96');
define('SECURE_AUTH_SALT', 's9>@<4 zadwU`@^/VsxY$U7_n+^2QrKX1Wnpg~@>o-$bAnV+keAU;!QN+zhg>EoL');
define('LOGGED_IN_SALT',   'Czyy<#qjEsox=?a0///uZRU@r*d^SvK]L=olrR-J*+OJ<;Dzw~T$Hd  gMs@)Zsc');
define('NONCE_SALT',       '^{U2OMN.@8Oz?)(dx8YBG`{q;$$z[b@qlKukAY2l[8wLdzb,<hi|8Du>9BshCc}d');

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
