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