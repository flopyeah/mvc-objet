<?php

// Create Router instance
$router = new Router();

// example.com
$router->get('', 'PagesController@home' );

// example.com/a-propos
$router->get('a-propos', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
// reception des données 
$router->post('contact', 'PagesController@contact');

// pages Plateforme
$router->get('plateformes', 'PlateformesController@all');
$router->get('plateforme/update/{id}', 'PlateformesController@update');
$router->post('plateforme/update/{id}', 'PlateformesController@update');
$router->get('plateforme/add', 'PlateformesController@add');
$router->post('plateforme/add', 'PlateformesController@add');

// exemple.com/plateforme/12/lorem-ipsum-dolor
$router->get('plateforme/{id}/{slug}',    'PlateformesController@show');

// page 404
$router->set404('PagesController@page404');

// Run the routes
$router->run();