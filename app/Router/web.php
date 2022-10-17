<?php

use \App\Router\RouterCore;


$route = new RouterCore();


$route->get('/','ProductController@getPageProduct');


$route->get('/addproduct','ProductController@getAdd');



$route->post('/store','ProductController@store');

$route->delete('/delete','ProductController@destroy');

