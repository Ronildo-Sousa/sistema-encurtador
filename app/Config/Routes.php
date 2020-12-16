<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Web');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Rotas de navegação
$routes->get('/', 'Web::login');
$routes->get('/home', 'Web::home');
$routes->get('/cadastro', 'Web::register');
$routes->get('/login', 'Web::login');
$routes->get('/sair', 'Auth::logout');
$routes->get('/minha-conta', 'Web::minhaConta');
$routes->get('/minhas-urls', 'Web::minhaUrl');
$routes->get('/(:alphanum)', 'Encurtador::desencurtar/$1');
$routes->get('/redefinir/(:alphanum)', 'Auth::redefinir/$1');

$routes->get('/esqueci-a-senha', 'Web::forget');
$routes->get('/redefinir-senha', 'Web::redefinir');





//Rotas de autenticação
$routes->post('/register','Auth::register');
$routes->post('/login','Auth::login');
$routes->post('/encurtar','Encurtador::encurtar');
$routes->post('/editar-conta','Web::editarConta');
$routes->post('/editCont','User::editCont');
$routes->post('/delete','User::deleteUrl');
$routes->post('/forget','Auth::forget');
$routes->post('/resetSenha','Auth::resetSenha');




/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
