<?php
    ob_start();
    session_start();
    date_default_timezone_set('Asia/Kathmandu');

    define('SITE_URL', "http://news-portal6.loc");
    define('SITE_NAME', 'Suddhodhan Khabar');

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
    define("UPLOAD_URL", SITE_URL.'/uploads/');

    $state = array(
        'all' => 'All State News',
        'state1' => 'State 1',
        'state2' => 'State 2',
        'state3' => 'Bagmati',
        'state4' => 'Gandaki',
        'state5' => 'State 5',
        'state6' => 'Karnali',
        'state7' => 'Sudur Paschim',

    );

    // for advertisement
    $position = array(
        'home1' => 'above_logo',
        'home2' => 'side_logo',
        'home3' => 'below_menu',
        'home4' => 'center_ads',
        'home5' => 'right_side',
        'home6' => 'left_side',
        'detail1' => 'detail_one_ads',
        'detail2' => 'detail_two_ads',
        'detail3' => 'detail_three_ads',
        'detail4' => 'detail_four_ads',
        'detail5' => 'detail_five_ads',
        'detail6' => 'detail_six_ads',
    );

    // for front-end

    define('ASSETS_URL',SITE_URL.'/assets');
    define('ASSETS_CSS_URL',ASSETS_URL.'/css');
    define('ASSETS_JS_URL',ASSETS_URL.'/js');
    define('ASSETS_IMAGES_URL',ASSETS_URL.'/img');

    // for seo
    define('META_KEYWORDS','newsportal, news, nepali news, nepali news portal');
    define('META_DESCRIPTION','News will provide you all sorts of news from nepal.');
    

