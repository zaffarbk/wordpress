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
define( 'DB_NAME', 'WellMed' );

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
define( 'AUTH_KEY',         '_TJFt@b9;u(L~GM;D&z1+Z,-0J6fM_JP8bOBSyYQ6as7U5kGa?ERBvSZuvzRlZ!=' );
define( 'SECURE_AUTH_KEY',  '[7gUBLPFM^=Nx}c/7r*BDf7Q^%KOr}vIO5LeA@9Pvm:l/qKA!5LoE+3CoI~ya:}j' );
define( 'LOGGED_IN_KEY',    'QI>;QH!ZB;zigAj4xO K+N82~,])SCXdNz69<j(=7[>tu$=Yhf`AmRKvFI{{S9]A' );
define( 'NONCE_KEY',        '|bW2Mo &6rMuJf@C~l^v6J!LwFFK+L))K2UbMz? _0EuLZ5v,R7Vc&4#3PkvEQ&k' );
define( 'AUTH_SALT',        '`3hNx17=qBa?Q2-fT);f6oSjZFBZ]lZT;j>H1{X[;jbfdh0yTZ&_=#:pF_-4]#[5' );
define( 'SECURE_AUTH_SALT', 'Y2lMvw3sXK>>A{T]R#239Ew5p}^,rxLCCI<.Wxs1VLLT3E}HsavM4R5$%u2r9TE@' );
define( 'LOGGED_IN_SALT',   'MgV WoP;AjhpMt[/{4iM-gnQB3mXHPYtYlg8:oV0gd<UYOJRL(F#Q@@h 0Kj=4nM' );
define( 'NONCE_SALT',       '<*?ov[8[=Di]zf{DRAqBabC$-O)Vq^c^gU7pwD<?j]@[* |p%LPgS>r_!JCbs)q{' );

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
