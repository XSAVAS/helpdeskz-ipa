<?php
if (!defined('ROOTPATH')) {
    define('ROOTPATH', __DIR__ . '/'); 
}

require_once __DIR__ . '/vendor/autoload.php';
require_once ROOTPATH . 'app/Config/Constants.php'; 

$fetcher = new App\Libraries\MailFetcher();
var_dump($fetcher);
