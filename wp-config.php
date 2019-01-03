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
define('DB_NAME', 'XXXXXXXXXX');

/** MySQL database username */
define('DB_USER', 'XXXXXXXXXX');

/** MySQL database password */
define('DB_PASSWORD', 'XXXXXXXXXX');

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
define('AUTH_KEY',         '&s/r(6lr{@7F)=X-d>H}ecEl:8-*~f*bYsl%C[<&Q]#VpS`kpd>T8f@|[RvLUG8c');
define('SECURE_AUTH_KEY',  '$x%Fy+Y#^B3p-b!(iao.:+$Q_||([[/:^_-wOXn<3zPXWU@:b9EwBN]qI!!v85T{');
define('LOGGED_IN_KEY',    'bN|dj<O|{|Y8$BE?ws-@BUT0MOwVT5|ELrk`Cjr}q&cEAe-Y^Pc+BY%6T7[xi}DA');
define('NONCE_KEY',        'vLX+D[*_G{&d9$P9GLI+.C_+,3:>(`}#M.8}vF=:+Xlm{bsI+2U)O[ =#p+*PhA;');
define('AUTH_SALT',        '9|7U|<40n2|(gOwu||%;2w,JSa!|]3om`E+MiNN||;23G7CWbSd8>$Aqzf}~dt{7');
define('SECURE_AUTH_SALT', 'M8WQUpqu02gEoU0OLPj%89#l*C6B)FLh47q?zM!E9<W{TLMm5X?r{&2,I+TmqvoW');
define('LOGGED_IN_SALT',   '{}1!bV^me{jF#+gR+Du|~Ygn+!NIqW.:kJ<|i4(v+2N+J;-&K(o~5unH<>Y:pzlF');
define('NONCE_SALT',       'F5/=pJ5]k&`|RSN(v:qFs+zUCAIIZJ`suof}?<Jt pwy);&qND,>58^GZI$7OFO+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'XX_';

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
define( 'WP_MEMORY_LIMIT', '256M' );
/*ini_set('log_errors',TRUE);
ini_set('error_reporting', E_ALL);*/

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
