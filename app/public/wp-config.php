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

// ** MySQL settings ** //
if(file_exists(dirname(__FILE__) . '/local.php')) {
/** The name of the local database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
} else {
/** Live database setting */
/** The name of the database for WordPress */
define( 'DB_NAME', '291824_b01fdc6a639857e968f526730b08a7d6' );

/** MySQL database username */
define( 'DB_USER', 'golfdiscountsguide-166277' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Kelamin22' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
}



/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'VZmVlc2BZUBc/NjAz2dqBDSEVR+9OuMn7rWyZ9DWhGudxYtnNbg+umfLlDLpgzJJ5uyhoqsFoRFD7vopgj8adA==');
define('SECURE_AUTH_KEY',  '2MpNkVYVzXMuIQUVgN6zXA2xgA9sgeaGQtLKdDbg4kcJhF229S7F+hmalXN9RyuSWwhII7ZO0bNYp20ierU5Ww==');
define('LOGGED_IN_KEY',    'uGag3uJ/JJ2r/Ac0addijZ00649VOFDAwxPDwZ1hkO2V+AENAVHwjOusMtmZiQqaxIIuYxjpNtbo3r9faa873w==');
define('NONCE_KEY',        'yYOvizpqanoI5Uj9Fxnv/Vv6QPdzzz8YWvPw9dg8/o7DqklR+cImn0ctu78xkhsJQ9N5qbkMnY3ojgeLKpYC8w==');
define('AUTH_SALT',        'Wd7I+BHOcD/iXPWF8Pw8UXwAnqoNdWfmhpXKwu1dBFiH112x3/LwTxKxzVvO7PFFDlT7Z3hesJtsZ915QZssGA==');
define('SECURE_AUTH_SALT', 'y7b35TJisEPiClTWLAg0rX24vV8ns+OFa7O/CQ4JrBwTlQcJRFqsGj9eBnOw2j/A1YpfrJqDzSdvfYRVggqhqA==');
define('LOGGED_IN_SALT',   'CXx8uNH3+GD7To6bDuE/a3Rd6cPj8Acbe6myR/ybyivva8eK9y//35xaj1wtOWSLYFWqOTKYY9//CfGagUUasg==');
define('NONCE_SALT',       'eonsWHGx6LwOAswTOfFHxWgwA44ppcdwlKx7Krv0/ay39ckG+VoJO51nWW9TjrhHFARlIesWQVvrTyzYMhphtg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';