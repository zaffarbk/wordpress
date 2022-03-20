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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'striksi' );

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
define( 'AUTH_KEY',         'B@]|,:[8;=?1? #f22.F~a*~7l)k|%jK[DwUHjDpk(wgU_0e5aVLu3:rDg0vzbiS' );
define( 'SECURE_AUTH_KEY',  '<q11>y9Sqt%;AYV4dXoy}N{XItlE5p^UO?8u,AM&vws7Tx4}6dB]+3_E$3vKI1O/' );
define( 'LOGGED_IN_KEY',    'lG>-(YX4{KSpO=%SdRCl5an[<kyt{`E4; =B{Sx8bmi3gkbiRuG^}9ph-Y0|~~bh' );
define( 'NONCE_KEY',        '>HaluLC0q&d.(>8g(4(y3q.|pY*|1+Yzi*~KH}C>*Z)C1VO]:N0Ag]?vdg`Q12je' );
define( 'AUTH_SALT',        'Re7w7c23+@l{bf0dLK$Q^u:q8L&:8SGQh@8z3=/)SX7,7b0~;$h.D[fF@Ii<IIlx' );
define( 'SECURE_AUTH_SALT', 'HP2427x>O4Ux|T3rY0kW6jyqa>qPssw_R?G_l7(m]e^LXQtb?4C#oYMZTdTMX[-`' );
define( 'LOGGED_IN_SALT',   'fJOX;JmAC0f+[_J9YW>HRI{Sgi7vt8w=!cQQ(GPWE;2[^0<z+OH6Hh6!EN+R(G+ ' );
define( 'NONCE_SALT',       'P+W&aPb,~W@qbA.K-iUK~W+X;&p@!g%!Pb:|0Hv@,jG^F!HF@cdZ/YP]@!F$hE9t' );

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
