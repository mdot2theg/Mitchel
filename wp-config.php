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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'root');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'k:i ;bE.2-nkv%^^2Ur-aQ_GHeLSYdvd2_s^z329Blq9xke8O2p`_rp{Y Gsuf, ');
define('SECURE_AUTH_KEY',  'gwL:]w$vw+$/n|]z|%xWRuGR_b221uj!OU(a4jO>/qnQBK>bz:kk.U~]x/5-<b! ');
define('LOGGED_IN_KEY',    'j*0[Z9APj^g,nz!_e,kS_RF{Q~t.MV?Vy].J!+UAMKTqsdso,|u;H>44.]r Sh)5');
define('NONCE_KEY',        '0Nb_U7onZ0n/tZ&TLT`k@=es(zs^:VV ,<7TN$#j?1$q6L5qI^`/jUe5RLI0h7F_');
define('AUTH_SALT',        'xI5LWZe-a@~}q|@>I}_ppgQStbY]P<_QAa9!uFN9dW{wZXTk*kYBGbPcYjJa&xX*');
define('SECURE_AUTH_SALT', 'Em6ygAqu&9M/5Dd?fU=W>Y1{E3_6m;,k=Y[en(1Mum U7wrrqgaHp@J{F8/9- =^');
define('LOGGED_IN_SALT',   'yK?5?([M8en2_]yP}8>d?oopM)G]!RA}o(,1[`;Vi -lEZQ[x 0M2b?_J}fA8Za|');
define('NONCE_SALT',       '?]_@L;5m-2Xj.LBi@Z>KA~r{7!DM{a~yf).N6^T~Yj)Rfg8YziYf[[$@W]BBvb*`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
