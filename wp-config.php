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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/dh_8gx45p/albatrosspa.com/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'albatrosspa_com');

/** MySQL database username */
define('DB_USER', 'albatrosspacom');

/** MySQL database password */
define('DB_PASSWORD', 'xACST8AD');

/** MySQL hostname */
define('DB_HOST', 'mysql.albatrosspa.com');

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
define('AUTH_KEY',         '@S?4v5dP"s`VeqD:Hfs|Rmx"U(BLY9yivz1OMp~nAQDGPUO$VFPA5ZAGm!o"k"/j');
define('SECURE_AUTH_KEY',  '|%rr$xipPeGrvwcTvB~tAbVKf3S6b0+Yx:%)t^y`QoaifikMai#"Pb3K6Aqrp"6o');
define('LOGGED_IN_KEY',    'Q)Q@Yb5RFrID(*2tij_$TB|PN;hS!M9iYqZm!^olQYsm@NWm+%R!V#`v@*Luq6he');
define('NONCE_KEY',        '!xZ|"T#Rqe_S_DsT%p!hCz&YguEw4&(eaMR_":oCuC1!Yq/Sft1mKRB!?AItJC:4');
define('AUTH_SALT',        't~)bc*nCXvK/1a^Ox)tYU0dV(b^tlqq9)0EH1%W#ArgMxA5g"ZAeP0gsq#%;SR&;');
define('SECURE_AUTH_SALT', '4b"9c&i98g:ap(inSX&Bz2av$Jl&8$f0O1djL4v1N_Id9^*kJru(ehbt^D`ONir0');
define('LOGGED_IN_SALT',   'rxJJlS~V%wb(JW~Oa3b|uz:4A"WGq8+dBq!J:4*Pe"TanevkyGi8raP%eDti%`cY');
define('NONCE_SALT',       ';8KV15au8pUkHUOO1Btj/s_~XRp;+:UPjixNdM&!"(I&CBs$K73Fgt#3IP|HB5SS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_znrhzp_';

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
define('WPLANG', 'es_ES');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Removing this could cause issues with your experience in the DreamHost panel
 */

if (isset($_SERVER['HTTP_HOST']) && preg_match("/^(.*)\.dream\.website$/", $_SERVER['HTTP_HOST'])) {
        $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        define('WP_SITEURL', $proto . '://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    $proto . '://' . $_SERVER['HTTP_HOST']);
        define('JETPACK_STAGING_MODE', true);
}



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
