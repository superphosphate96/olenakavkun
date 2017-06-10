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
define('DB_NAME', 'merlotye_db');

/** MySQL database username */
define('DB_USER', 'merlotye_db');

/** MySQL database password */
define('DB_PASSWORD', 'du345vaa');

/** MySQL hostname */
define('DB_HOST', 'merlotye.mysql.ukraine.com.ua');

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
define('AUTH_KEY',         'CoHH*OfxPdm7KAyEWXEhA%gNMGjXvv5f6kdK1ySBHEpUqfkn7ZdAlKQHEGG3A%eu');
define('SECURE_AUTH_KEY',  '1eyml)SSg)0FMY7QL@0gi%cWbI9nurh^SOesHZ@M5BThbvsY0eUmfCCcx)3H@UnP');
define('LOGGED_IN_KEY',    'GF^FAtt9PDHP&8Gx&DHZPHJsEqv5Y2)xiWeG4qqAGDIjexzv4vqr2Kw!KjFScind');
define('NONCE_KEY',        'H38rtQsWiuicRbSY59M4a1&nFpZ#ZUcIev#(oR5YV%454*AqKg7p4ea^1EczBBad');
define('AUTH_SALT',        'ImZvP1C&Fy^uIber9&aKnOKU!Y(5sRv42F#L#Bt%UY*XU8neKhwxcu)Z5ZDrk*WO');
define('SECURE_AUTH_SALT', '^2DzgpsMNLbnWuji)SDOXCc%9En0IhW4Yf444XTdhCq#tmnL^)wiOIvlv28o9s%6');
define('LOGGED_IN_SALT',   'oYw^7eDRE&H^Nz#mAGS!88sHlTZqaY9jcumHy!tOFMvKeo0hfE2QnlIla6dcVTJ9');
define('NONCE_SALT',       'V%ca6ig9MHN0(TfsyABp^TtXsE&4G*#aIdN2VocnifbeVmemEUfv#g@bK98q(s2s');
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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
?>