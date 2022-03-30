<?php ob_start();

defined('DS') or define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') or define('SITE_ROOT', '/home/igormakhinich/www/oop.local/public_html');
defined('INCLUDES_PATH') or define('INCLUDES_PATH', SITE_ROOT . '/admin/includes');
date_default_timezone_set('Europe/Kiev');

require_once INCLUDES_PATH.DS."functions.php";
require_once INCLUDES_PATH.DS."new_config.php";
require_once INCLUDES_PATH.DS."database.php";
require_once INCLUDES_PATH.DS."db_object.php";
require_once INCLUDES_PATH.DS."user.php";
require_once INCLUDES_PATH.DS."photo.php";
require_once INCLUDES_PATH.DS."session.php";
require_once INCLUDES_PATH.DS."comment.php";
require_once INCLUDES_PATH.DS."paginate.php";