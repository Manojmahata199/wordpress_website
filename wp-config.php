<?php
define( 'WPCACHEHOME', 'D:\xampp\htdocs\sanmarg_web\wp-content\plugins\wp-super-cache/' );
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sanmarg_web' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Td<nh~GUjslodRVXR%t_BHAl7t6L{A(C/g7O$vL!c2@Z$RkS+^B&lfR#/>.Q#kX8' );
define( 'SECURE_AUTH_KEY',  'PUrnX3/WHH#4*m|RSnae2f)BMT-(^RI,zjqo%A&.J8<KW ,Y-;q6NxkR8lzP6~ch' );
define( 'LOGGED_IN_KEY',    '(%.|&& :1C^)b24fR?L#K7UO+V1^HrzYPT[?B@mC=8M}rKn!Y{wh:L8M)+VZ@c`9' );
define( 'NONCE_KEY',        'jH^5&95)MjNTKF5?,j#g` H]C8/~3q?z1<kxvH>*E`*a7$hl61FX@jx;[9lR0cY.' );
define( 'AUTH_SALT',        '!m@ujKPptcz]%niIM%tp-iX822aDCL%mRZU>r_*[`SHVS71h9F{r>+j`=O61OaF:' );
define( 'SECURE_AUTH_SALT', '>[>.K<]X8#F+!M3?AhF/lZs[~_CCh(y f#a/GzgD~_CfPHU]r# R%liFF<bX8,e%' );
define( 'LOGGED_IN_SALT',   '^p!>~;AwdXcTMhOQk>)bb2#9}/V3ViJCltv,F0vNrI<%sTOkCf/M)+_u*17kG]Ma' );
define( 'NONCE_SALT',       '7Bax;v`}<vD$~Swx:P]gWmjRTZM;-zlvsMexHVNL;84l]bjb&QazE*jyT[9:]fb*' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
