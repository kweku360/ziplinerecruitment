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
define( 'DB_NAME', 'zipliner1_sQn8' );

/** Database username */
// define( 'DB_USER', 'zipliner1_oTdJ' );
define( 'DB_USER', 'root' );

/** Database password */
// define( 'DB_PASSWORD', 'dCnXM2IyuAOVClXsujRmkUa1WG7MN6Bl' );
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database port */
define( 'DB_PORT', '8889' );

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
define( 'AUTH_KEY',          'xZwG~jWjQt>3[gYu;&4(0ORbqeLa3>K7,xf531;Kej:7wE:Nq=tKy4H44(T*2Q}F' );
define( 'SECURE_AUTH_KEY',   'gQ!_}DJ=xt)h;(yPIyd?();gCq61FVq%wl|*dHu_gf_2IYfFbiKK4{tQ7G8meE30' );
define( 'LOGGED_IN_KEY',     'sK=(k%x9=pP7*vT9+BN[N]nyJo#L8S?8RkDdQ1zWeppEOZ:7?3_~ *h @IFs<*-(' );
define( 'NONCE_KEY',         '3MiW_F@u4mH85x?Si#g -!it3aG|0HDpoz6qks}wpS=(*p,f,}gGha@Qi5Who|3g' );
define( 'AUTH_SALT',         'pTMll]mO]$t0D$ZTlrL^1v$c.Zi$RckFD+okug|m?Jm~k@GTzH%,v!kw`QcuV&wQ' );
define( 'SECURE_AUTH_SALT',  'aj8j%5wKB5+?e*2PRu9%E.>;@wuU3DJ.jK+GQ~S9@}@J-8/tI@D?`$M0hBoCfTxC' );
define( 'LOGGED_IN_SALT',    '<C.,O1)yf(zTLx@mmpQ`Ql; w<k|zt4/x$p8-r%qR!2$vB?d?w;/`x9-bDa_^uSl' );
define( 'NONCE_SALT',        'sJOL3?|/CU2]]B?D<%:2HP`RtWu7f%8I|gUmw&>J.C<JY=?hfSw|0qZOX<qTdH$W' );
define( 'WP_CACHE_KEY_SALT', 'X3>Xo{`A64_v0J0Jk|S%?9#7_cVXT@<AODQ+51,%ROj!~Gh{7,GX60;}k^x;C8P.' );


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
	define( 'WP_DEBUG', true );
}

define( 'DISABLE_WP_CRON', 'true' );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
