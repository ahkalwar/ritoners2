<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ritoners' );

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
define( 'AUTH_KEY',         'zrhjP`o;gQ2ajlSVY?!blnQxU([=b#g|M{yMA~Di2BbJ@loVW>WJ&R|:0@jQvP<t' );
define( 'SECURE_AUTH_KEY',  '+@H#onv3S]LSZ?5LW.4WjL;_Ml[^u%}>X%x3HpH`BkL!ejs{27L Odoe1L]WM:AY' );
define( 'LOGGED_IN_KEY',    'cL`OeI$Ypl~.H3k}]|ApqsTKp9<algME~;!&Ohqtz:b[azc.@0aF##^s_V2.B7+M' );
define( 'NONCE_KEY',        'aPaKPp Yovv}Gy3ySzoafuI!Y@uKEyq+F&?x~6UUp!7j&c$# n2&dx{ p%4W/y3x' );
define( 'AUTH_SALT',        't8]ela.V]<mq1Jup;TXHkl>6wDAXKSeo9y.o%ZD]z*;M~x~_uJ*_52`UD?>v@^t|' );
define( 'SECURE_AUTH_SALT', 'I(m2d/0 l^;PfQ;:#%U7$+H(IS3`gX,LPwIHhqfie+us5(N=h_v)SN:dq}C5R[0c' );
define( 'LOGGED_IN_SALT',   '<SI8D9{,Y}p]k-{|Im)8eF`50:JG3I;gC{RI{&4}!UEz+63:}meg*m4823Tl=fTq' );
define( 'NONCE_SALT',       'Tq7fTI~M|,SNzB*&TS~u[{*L9W`9e`{(Z {XqlN8@&3{NiJ*g^H6xruFcX ):6t2' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
