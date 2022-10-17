<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once  __DIR__.'/../vendor/autoload.php';

use \App\functions\views;

define('BASE','http://localhost/product-list');

views::init([
    'BASE' => BASE,
]);

//require_once $_SERVER['DOCUMENT_ROOT'].'../app/Router/web.php';
require_once __DIR__."/../app/Router/web.php";



