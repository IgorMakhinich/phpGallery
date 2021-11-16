<?php

defined('DS') or define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') or define('SITE_ROOT', '/home/igormakhinich/www/oop.local/public_html');
defined('INCLUDES_PATH') or define('INCLUDES_PATH', SITE_ROOT . '/admin/includes');

require_once "functions.php";
require_once "new_config.php";
require_once "database.php";
require_once "db_object.php";
require_once "user.php"; 
require_once "photo.php"; 
require_once "session.php"; 