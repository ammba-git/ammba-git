<?php

###
# Standard Substrakt wp-config.php
# DO NOT ALTER THIS FILE UNLESS YOUR LIFE IS IN DANGER.
#
# Only change the contents of your local version of .env and
# DO NOT COMMIT IT TO SOURCE CONTROL
##

# Include phpdotenv so we can store local environment variables
require __DIR__ . '/phpdotenv/src/Validator.php';
require __DIR__ . '/phpdotenv/src/Loader.php';
require __DIR__ . '/phpdotenv/src/Dotenv.php';

# Local environment variables
# Store them in a .env file at root
# DO NOT check into source
if (file_exists(__DIR__ .'/.env') && class_exists('Dotenv\Dotenv')) {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
}

if (! defined('ENVIRONMENT')) {
    $environment = ($env = getenv('ENVIRONMENT')) ? $env : 'LOCAL';
    define('ENVIRONMENT', $environment);
}

if (ENVIRONMENT === 'LOCAL') {
    ini_set('opcache.enable', false);
}

if (getenv('MAILGUN_USEAPI')) {
    define('MAILGUN_USEAPI', getenv('MAILGUN_USEAPI'));
    define('MAILGUN_APIKEY', getenv('MAILGUN_API_KEY'));
    define('MAILGUN_DOMAIN', getenv('MAILGUN_DOMAIN'));
    define('MAILGUN_USERNAME', getenv('MAILGUN_SMTP_LOGIN'));
    define('MAILGUN_PASSWORD', getenv('MAILGUN_SMTP_PASSWORD'));
    define('MAILGUN_SECURE', false);
}

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
define('AWS_ACCESS_KEY_ID', getenv('AWS_ACCESS_KEY_ID'));
define('AWS_SECRET_ACCESS_KEY', getenv('AWS_SECRET_ACCESS_KEY'));

$DB = parse_url(getenv('DB_URL'));
define('DB_NAME', ltrim($DB['path'], '/'));
define('DB_USER', $DB['user']);
define('DB_PASSWORD', $DB['pass']);
define('DB_HOST', $DB['host']);

define('DB_CHARSET', 'utf8');
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
define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));

/**
 * Redis Object Cache setup
 * Define this params as env vars
 */
if (ENVIRONMENT === 'PRODUCTION') {
    $REDIS = parse_url(getenv('REDIS_URL'));
    define('WP_REDIS_HOST', $REDIS['host']);
    define('WP_REDIS_PORT', $REDIS['port']);
    define('WP_REDIS_PASSWORD', $REDIS['pass']);
}
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
define('WP_DEBUG_LOG', getenv('WP_DEBUG_LOG'));
define('DISABLE_WP_CRON', getenv('DISABLE_WP_CRON'));
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
