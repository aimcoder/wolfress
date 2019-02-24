<?php
$table_prefix = 'wp_';

$schema = 'http://';

if ((isset($_SERVER['HTTP_USER_AGENT_HTTPS']) && $_SERVER['HTTP_USER_AGENT_HTTPS'] == 'ON')
  || $_SERVER['HTTPS']) {
  $schema = 'https://';
}

define('WP_HOME', $schema . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', $schema . $_SERVER['HTTP_HOST']);

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
  define('ABSPATH', dirname(__FILE__) . '/');

/** Add Config Local */
if (file_exists(ABSPATH . 'env.php'))
  require_once(ABSPATH . 'env.php');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
