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
define('DB_NAME', 'miakotal_WPEHN');

/** MySQL database username */
define('DB_USER', 'miakotal_WPEHN');

/** MySQL database password */
define('DB_PASSWORD', '6xGOy:lodVlwUbG?h');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', '5015738c460cbfd8fe61cc270a4f4c3c5c6ba1eb190ebd22a0416b27783cf1ea');
define('SECURE_AUTH_KEY', '141bb5c0ae1bbf0a5988612b1b6d1abbf4117c09ae45ed47c39e8beeb852aa49');
define('LOGGED_IN_KEY', 'da09efce17055341e152e4263f70f780455856966229f84b4c80ec15c2e5dbcc');
define('NONCE_KEY', '7865a6d1bf68582afe201cd5da3e242219f46ea528618d053d0193d7d5373bf6');
define('AUTH_SALT', '83979a699dff58c5e42df046780b0189739e0e46ccf3521e28ec1e3c67e62508');
define('SECURE_AUTH_SALT', '9a2acbe9181dde4a927b3e94b46be50a2ed1ce6cc0c2b703a9f1dce29b44321d');
define('LOGGED_IN_SALT', '96ce35b6836b932c2eec6e3cf01497045b13f1f1f5a42a624123bfc7bcece30a');
define('NONCE_SALT', '3af86bdff116a29c5b941ef772e764ff793b269377460bc9786e35ae760699bc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'IlN_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
