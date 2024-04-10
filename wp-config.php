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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sudus' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '}QC/Zdm,_@Gh>=2/0z_>T[)f]N@i!?~X3s$xtr#n$|{F+a^vdA&oow;uV.B.%?:n' );
define( 'SECURE_AUTH_KEY',  'FR>!9y} Ye#b^@?YL&<vYyiE+t$BpF7gk-/%@o#!1}q-zNN M.Z+~,r?*p4LRnZB' );
define( 'LOGGED_IN_KEY',    'Q+UE%:Be6=7(9Qm|?t^=e{J;k|zhu4&VI@E!yWhke.*|}?p`;D#s5de5+>?]}a4;' );
define( 'NONCE_KEY',        'xs9;pP[.I&C:0*4@rK&X_V&~+REl;O62CGWpR}9wSN_6vqgN4[v:$B{<..c^tXbV' );
define( 'AUTH_SALT',        'haD+*!J;uqTr8Rt!]L9Tu/tK8|A{4AW428H~z6[[9s&{S)Y^#0M;7{@r~^[%6^z#' );
define( 'SECURE_AUTH_SALT', '3.n}R|=uU~f]:Gc5U4P}sBMb~=Zjv`Q*Y)%_:8,KPASGV1df#rmXxDP}x8,<-We|' );
define( 'LOGGED_IN_SALT',   'Qb+SN[XTA4&!Z!BY5Y>,=-`^0~PDTL+6:HQt/IW)H`RDP@8tb. ?<>2$#[^=I4^V' );
define( 'NONCE_SALT',       '?>.[|$v|!?0:,.5^|jOb^9OXE>ea.+_[378L7=);7&N.2=A?JwrbFD9Ny@jle|*e' );

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

/** Завантаження плагинів та обновлень без FTP. */
define('FS_METHOD', 'direct');

/* Вимкнення редагування файлів в адмінпанелі WP */
define('DISALLOW_FILE_EDIT', true);