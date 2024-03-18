<?php

use App\Controllers\Books;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\News;

/**
 * @var RouteCollection $routes
 */
$routes->get('books', [Books::class, 'index']);
$routes->get('books/new', [Books::class, 'new']);
$routes->post('books', [Books::class, 'create']);
$routes->get('books/(:segment)', [Books::class, 'show']);

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);