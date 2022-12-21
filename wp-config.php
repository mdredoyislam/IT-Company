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
define( 'DB_NAME', 'redoyit' );

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
define( 'AUTH_KEY',         'Jec1yoGe,wJrm/W*Rwr]w&B^i_GKiEX1>4Rs5uUP!s]P@>%u=(Wrp[@DRWCp9e.N' );
define( 'SECURE_AUTH_KEY',  'sx{<tTG0*D7b.r`rswq#;582d^4XJd1GQEj1dQDk((,]j2AUdIBm-~@6nQ6KVOz3' );
define( 'LOGGED_IN_KEY',    'zh0`F7x7yP,^d.@},_>|Y27SO4AGPG*YTn(|&]J(+^]5E:/C]yvZbt-DC]Vv2Ct ' );
define( 'NONCE_KEY',        'wUj*<*N0Pq<Pwg[1tW+XQF;eR6q$9ad*VgFR */QNU+iYLgR|`yE7cT>qSd n]w.' );
define( 'AUTH_SALT',        ',LxxygEv3bvQLs}A=Olc(l*40L?9Wem>.,S({S;r/l!]jFRBL+XV1ML%d01}9x-=' );
define( 'SECURE_AUTH_SALT', 'i9.-Q8HMu1yG.3sjoYI.-,A<T}l?pgZ%$9+wpL@E:hgjViH7iOD}n*3#[QA}%y*#' );
define( 'LOGGED_IN_SALT',   '})^p*,c_0Izkb:#Q) C)p@,7}q(v@x[h`4kq;B(fmzfTSu@@V6ec1$dqE|M;rv8)' );
define( 'NONCE_SALT',       '&cKqvG[wg!Z`m8y>P/),eFw%q_$io1lfzCC[u[Q]pJv-L1Ye#1HYW#.nt0A]_lP?' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'RIT_';

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
