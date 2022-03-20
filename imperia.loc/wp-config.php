<?php

$_SERVER['HTTPS'] = 'on'; 

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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */



// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'imperial' );



/** MySQL database username */

define( 'DB_USER', 'root' );



/** MySQL database password */

define( 'DB_PASSWORD', '' );



/** MySQL hostname */

define( 'DB_HOST', 'localhost' );



/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );



/** The Database Collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );



/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         ':;C3x694abLU@Rq6]kDU?>fwlZfQ:z_Tb[QOP]1Vj+ZSs+K+Bbh]KtQeNYQ4VH}e' );

define( 'SECURE_AUTH_KEY',  'oaThbgI[2]PcBEiNIR@5hGU|38hP+dx+pCi)MG7.s]jj`IU{A5C2>4r?RPj6o{R?' );

define( 'LOGGED_IN_KEY',    'phwM(>X[QA[ CYl}v2[^g:kvjFT(wV1yQGDK4DWD86S22h3YQ_TsQ90xLn4i`&/J' );

define( 'NONCE_KEY',        '7l2P!96ef8Iz`5][}ZO(`#2eEqXR&T8L2k~)e*;l;ps6Jj2/7[B](<:x`!&&$Nql' );

define( 'AUTH_SALT',        'vGO$D|))IZ9ZCb#4GVnRqBP:X!.2=UoSw{pNf,tp(sS-RWYVt!9rV:94iapX=t1r' );

define( 'SECURE_AUTH_SALT', '3I[zrUc0(Ki^N N0;|4J-kgi*JU!]fa6%?%jTE0qlt]BeN59x%jM4`F,nEZW1CD4' );

define( 'LOGGED_IN_SALT',   '%BV]juG_5w{B1=tXUgw*_NSG7|-0X,K=/PGz,UCdeg.02 kN` sky%RaldQkLB-f' );

define( 'NONCE_SALT',       '^eRj;]4`<DFI7X[|m}O(_fLq>3)X6-/b_B?IsiDq@3:o?.r.pUFkBI5pw0Bb|s{A' );



/**#@-*/



/**

 * WordPress Database Table prefix.

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



/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}



/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

