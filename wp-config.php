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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '[>,&i#2W;CFU-fxl<}$E<r?E*%l3?cXnp2?:)0nuZ(H$b|$jS&{@84?i(H>()!_0');
define('SECURE_AUTH_KEY',  '?4Gh(Z#b2]8O]20e5a^_gB.3S7]U>knKrBW?HL,^{gnweiQG}rSB>6RmZhTB,`e9');
define('LOGGED_IN_KEY',    'kxGmh@/bPoOgYD6.&Z`NL_MJuO+gU!;c)G9#NKVx.J+f`$5ZJ}.<EP3aR[KKmPSh');
define('NONCE_KEY',        'b$pPo)L7G@s#!Xd(P=PKb +jN2=KY;ymNPV2m2^uWD[&@{Cyq;Djw(z?bo:l/9>n');
define('AUTH_SALT',        'Qx1U<h5Or=rYO`({tOBJZ?d/N#;E>Q|U]&y};pIqa4a4%3-JF!?pSDj*$:`Jk%pH');
define('SECURE_AUTH_SALT', 'Fcw1Hr+p_*1(cqfmX&=2a7x9O4)CUfBg/TCyED%0sZa%DpyytcRm[a-3E:X9Yu%b');
define('LOGGED_IN_SALT',   '[`Y}^-Sp=z(Y`~5}i2vs}.NZk*Pyg}~Ja,V$mbpCIzuN,0oe6?ka^ ._%`KH+PO=');
define('NONCE_SALT',       'a#811Y(r]r=pO0Xr{%sXnbAZZLn|v@:d RH4be_Nsil#GJV]14qD<#W,C.4BU_n2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
