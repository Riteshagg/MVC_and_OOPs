<?php
$root = 'C:\wamp64\www\learnPHP\self\\';
$rootURL = str_replace("\\","/",$root);
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);
//error_reporting(0);
define('DEBUG', false);
define('ROOT_DIR',$rootURL);
define('BASE_HTTP_PATH', 'http://localhost/learnPHP/self/');
define('WEB_ACCESS', BASE_HTTP_PATH. 'frontend/views/');
define('UPLOAD_FILE','C:\wamp64\www\learnPHP\self\frontend\web\\');
define('SITE_CONTACT_EMAIL', 'kumariritesh99@gmail.com');
define('SITE_LOGO_URL', 'http://localhost/learnPHP/self/common/logo.png');
define("APP_NAME",'SELF');
define('SITE_NAME', 'Self');
define('SITE_SLOGAN', 'I have to learn about MVC pattern in PHP');
define('GMT_DIF', 'Asia/Kolkata');
define('EMAIL_SMTP_SERVER', 'smtp.gmail.com');
define('EMAIL_SMTP_USER', 'kumariritesh99@gmail.com');
define('EMAIL_SMTP_PASS', 'Riteshagg1998');
define('EMAIL_SMTP_AUTH_HOST', 'smtp.gmail.com');
define('SMTP_PORT', '465');
define('EMAIL_TLS', 'TLS');