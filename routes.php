<?php

// Create Router instance
$router = new Router();

// example.com
$router->get('', 'PagesController@home' );

// example.com/about
$router->get('about', 'PagesController@about');

$router->get('contactez-nous', 'PagesController@contact');
$router->post('contactez-nous', 'PagesController@traitementForm');

// pages article
$router->get('ajouter-article', 'ArticlesController@add');
$router->post('ajouter-article', 'ArticlesController@save');

// exemple.com/article/12/lorem-ipsum-dolor
$router->get('article/{id}/{slug}',    'ArticlesController@show');
// exemple.com/article/12
$router->get('article/{id}',    'ArticlesController@showId');



// page 404
$router->set404('PagesController@page404');

// Run the routes
$router->run();