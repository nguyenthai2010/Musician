<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'musican_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '!9&qd|AoVt~BB6qw^RI-/gLE)pffgXaT-H~,i+|L|DvC8*J@c|[7|]4]DYX9qJi2');
define('SECURE_AUTH_KEY',  'iOxin_aF;6Rs-Ns/:A@>=- z{kQeLK,!,8aIV,(;tt<gRJj)}az8XbQ3OA0y}KJ@');
define('LOGGED_IN_KEY',    'Hm15!^-V2p%HW}G~PEtTg=N~Nm-y;~^cHEd9nP1KS!}G#X&j@QUqq+cfBSa .=jT');
define('NONCE_KEY',        'f[t,k4IKKFBsMQa& M~:(:|<IcP&!F~Q@0PR3{c0eh~5+)aqjxUTTaF~g<P;YE-+');
define('AUTH_SALT',        '(G2Ip>7 +r.(86-g+qry,Op>I5s.jI0gSReW1S:D37$#$.pf{3v3bIwPD;S{C,it');
define('SECURE_AUTH_SALT', 'WFJJZjqlpgoCq)+;/w|G%.Eo-0*`f@_`-D+%}}Z|tzh}x?f6k3K)-toLJC*iUxP<');
define('LOGGED_IN_SALT',   '7@8;-|+uY#Uy -G=T>W|?fy1gP[F9D>[,=}KN/E:tN|Js.{v G}/z)VAlI3n$(sD');
define('NONCE_SALT',       '.`&YZlqU55+Y P-.NP7FvqkCACM!7Ez1RM$MO/vC2ac=0e*Vj0p3.O93EK(uH~{s');

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

	$domainName =  isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] != "" ? $_SERVER['SERVER_NAME'] : "" ;
	if($domainName == "")
		$domainName =  isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] != "" ? $_SERVER['HTTP_HOST'] : "" ;

define('WP_HOME','http://'.$domainName.'/PHP/BLISS/www/YVES/Musician/sourcecode/BE');
define('WP_SITEURL','http://'.$domainName.'/PHP/BLISS/www/YVES/Musician/sourcecode/BE');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
