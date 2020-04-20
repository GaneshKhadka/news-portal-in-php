<?php
    ob_start();
    session_start();
    date_default_timezone_set('Asia/Kathmandu');

    define('SITE_URL', "http://news-portal6.loc");
    define('SITE_NAME', 'News Portal');

    define('DB_HOST','localhost');
    define('DB_NAME','news-portal6');
    define('DB_USER','admin');
    define('DB_PASSWORD','admin54321');

    define('ADMIN_URL', SITE_URL."/cms");
    define('ADMIN_ASSETS_URL', ADMIN_URL."/assets");
    define('ADMIN_CSS_URL', ADMIN_ASSETS_URL."/css");
    define('ADMIN_JS_URL', ADMIN_ASSETS_URL."/js");
    define('ADMIN_IMAGES_URL', ADMIN_ASSETS_URL."/img");

    define('ERROR_LOG',$_SERVER['DOCUMENT_ROOT'].'/error/error.log');

    define('ALLOWED_IMAGES_EXTS', array('jpg','jpeg','png','gif'));

    define('UPLOAD_PATH',$_SERVER['DOCUMENT_ROOT'].'/uploads/');

