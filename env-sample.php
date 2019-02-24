<?php
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', 'utf8mb4_unicode_ci');

/**
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');

/**
 * Optimize WP
 */
define('WP_DEBUG', true); //Change to "false" on production
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('AUTOSAVE_INTERVAL', 86400);
define('WP_POST_REVISIONS', 0);
define('DISALLOW_FILE_MODS', false); //Change to "true" on production
define('WP_CACHE', false);
