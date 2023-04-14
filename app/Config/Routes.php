<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setAutoRoute(false);
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'PagesController::index', ['as' => 'home']);
$routes->get('/logout', 'AuthController::logout', ['as' => 'logout']);
$routes->get('/updatePassword', 'AuthController::updatePassword', ['as' => 'updatePassword']);
$routes->get('/mainPage', 'PagesController::mainPage', ['as' => 'mainPage']);
$routes->get('/setup', 'PagesController::setup', ['as' => 'setup']);
$routes->get('/return', 'PagesController::return', ['as' => 'return']);
$routes->get('/transfer', 'PagesController::transfer', ['as' => 'transfer']);
$routes->get('/taken', 'PagesController::taken', ['as' => 'taken']);
$routes->get('/registerKey', 'PagesController::registerKey', ['as' => 'register_key']);
$routes->get('/registerUser', 'PagesController::registerUser', ['as' => 'registerUser']);
$routes->get('/registerStaff', 'PagesController::registerStaff', ['as' => 'registerStaff']);
$routes->get('/success', 'PagesController::success', ['as' => 'success']);
$routes->get('/keyError', 'PagesController::keyError', ['as' => 'keyError']);
$routes->get('/userError', 'PagesController::userError', ['as' => 'userError']);
$routes->get('/staffError', 'PagesController::staffError', ['as' => 'staffError']);
$routes->get('/return', 'PagesController::return', ['as' => 'return']);

$routes->post('/postRegisterKey', 'KeysController::postRegisterKey', ['as' => 'postRegisterKey']);
$routes->post('/postRegisterUser', 'UsersController::addUser', ['as' => 'postRegisterUser']);
$routes->post('/postRegisterStaff', 'StaffController::addStaff', ['as' => 'postRegisterStaff']);
$routes->post('/login', 'AuthController::login', ['as' => 'login']);
$routes->post('/postUpdatePassword', 'AuthController::postUpdatePassword', ['as' => 'postUpdatePassword']);
$routes->post('/postTaken', 'KeysController::taken', ['as' => 'postTaken']);
$routes->post('/returnKey', 'KeysController::returnKey', ['as' => 'returnKey']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
