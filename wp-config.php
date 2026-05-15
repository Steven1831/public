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
define( 'DB_HOST', '127.0.0.1:10011' );

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
define( 'AUTH_KEY',          'yx&I4dS)_!=2sN{`I2|8GW:|A@Gd/YcIH*w|LzS/S]V&l{v>HqW:*Rg%v63KK:8z' );
define( 'SECURE_AUTH_KEY',   'U&&3mM Y?zt pEir]EFo;EKP4^b&b.GFlsVUwS>,&Mg#O/g:qh)cj-BA])#N27>p' );
define( 'LOGGED_IN_KEY',     'O7,7kL1To@P^tCtu-&p$g{]YUQT3Nj-ucBz;l;,+XKEm9`Yp^=D(p;ieC/]Wg}X(' );
define( 'NONCE_KEY',         'YySUl`Tm{[VykBwmu4`@.BYB,eCl:I>W+q52u5/|FCf#m?sM]h}]6+VdbE[tmSOR' );
define( 'AUTH_SALT',         ',~l}kI[l4o`eH.4u%u7]678YZrVHpAfB|{?k(+<{SFlk&2AZR>Id@>bo5m>/KfK?' );
define( 'SECURE_AUTH_SALT',  'Fy:uhyY99c|R#O3#uBe&$$wZ{Rnqu5d9E@Krn=Ftx-9bz#+R9Y/5fyo58JNLO2Vy' );
define( 'LOGGED_IN_SALT',    '7lR0@_xm>?c9<P8z)mz3Tzp5,TX^$ Xt/kN6!ei#[v%!Z%PFBc_`3,)&^tulN|ws' );
define( 'NONCE_SALT',        '_Ch@:|Due<# .t;IX#j2].!n9hG+WgA(tWWc%v>h$U`Op)=zSg3C1s;lF)o=Y7`n' );
define( 'WP_CACHE_KEY_SALT', '@oB<WSFiSoT^F*)B9Vs(L)D;/3k f!oCTI 0w<c}5)~uW^[7-sbL65[BYJlEV,Cp' );


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
