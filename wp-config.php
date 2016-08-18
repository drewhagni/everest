<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'everest');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'IIS<>%Fp*+PfhUz-IXxyb6SE&w<Ipi8N+>12sFk`u$zhf!uWs-?]uu>gc[L5$Np6');
define('SECURE_AUTH_KEY',  'pU;nL7;eCZ9Yb-@x {EkwX|x.iLEK^B{kSm`XhYpLT1%n~sQbGtM=6|mXLr<peX-');
define('LOGGED_IN_KEY',    'Ww6HQ~M=#,uwoa23q}RDwj?Q6/hXjHK0A/o9f-<POn<(YO$U55C`%7H2P_ao$NwB');
define('NONCE_KEY',        'S3L^(H8gC>j7LK1N>cyhX=Y%>vqDEdRfY}HeJ98#-L++Y[2punHE`Tfx|AE-aKZ?');
define('AUTH_SALT',        'vO>J1So +rw5V~9gZzj!^}.I:3X+I>oaK<s2bG),,v[E&*!&F|0<UwjJBR;8}]E ');
define('SECURE_AUTH_SALT', 'l3rs|1=<=gDwBh>|WA+*cF&.AvHqwl#zxZ9>eLE]|FsjBf4+%~t,Tn(}ddwxSpgv');
define('LOGGED_IN_SALT',   '+z+</#M8<ma++k<mad4oW],Z#/w5TO-Rn%Fh65:a[!rs9ap{R]&_25s_Ne%O8A1z');
define('NONCE_SALT',       'Zr{2b5+Z4:qPod|P2+vrITukO&B{3r(2Cv}oC?sGNy?gP]YpIy=(dj+)Icq1f=Wb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
