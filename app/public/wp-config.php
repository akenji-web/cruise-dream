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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '<J?4R=DU%)zZhy6WpPMlQ$b83{XUB?.o1y]FAf0PvO#^MNf6L=K+a{K<1ZL{c7JN' );
define( 'SECURE_AUTH_KEY',   '8!Fu_d2gmyk>V?Wwo5Ms,d>>2<F*8QF/h+?cg@4SX4M]i70*<1w4xR7PlWj:S61K' );
define( 'LOGGED_IN_KEY',     '7UrYkDQo.5,>/CU{(y7u/0IQ~M_6c|<zh(bdgzOh}6`,LW:Rhj7-{HiPlE+$}<~P' );
define( 'NONCE_KEY',         'KUWKk8X+:3PeQI`>bUFT7R|8~Gq*f;2^)zuXSL}?hLO]DT!O^)lH=*v1 *`1{h*2' );
define( 'AUTH_SALT',         'k&P7Dw|&!3,5`=*[8MC+Z90YqY^:doJ@:/Y<wmujl#YpuWZQ=YTj+XM.RFnXx8#p' );
define( 'SECURE_AUTH_SALT',  '5&al`9wTljN0wzCphAB:Xj4+w}@!qe2qZqunj?ui}~T +@n(^T|:5+9jC(4+wQ~B' );
define( 'LOGGED_IN_SALT',    '{#sRN_w{T)H3r5>!pul*p2L]*m>=v,!ioLZz;mPSoy2@q,uDegOQ6M~6nU00RAr3' );
define( 'NONCE_SALT',        '^HH(`^~&8L~Yf~6CJJlVzj.~g PKNFS*%hG#CH}mnch9cK_@tDpI j@9?taKf+Y{' );
define( 'WP_CACHE_KEY_SALT', '6]uJ`S;Q0(?A ^2)2:>0YY:V,U&:unfEJBUs-4A+FSL*p/jIo1{xRsjH4pnf` 2s' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
