<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = 'oops';
$route['translate_uri_dashes'] = FALSE;

//Route Berita
$route['berita'] = 'berita';
$route['berita/index'] = 'berita';
$route['berita/(:any)']   = "berita/read/$1";

//Route Download
$route['download'] = 'download';
$route['download/index'] = 'download';
$route['download/(:any)']   = "download/read/$1";

//Route Produk
$route['produk'] = 'produk';
$route['produk/index'] = 'produk';
$route['produk/(:any)']   = "produk/read/$1";

//Route Layanan
$route['layanan'] = 'layanan';
$route['layanan/index'] = 'layanan';
$route['layanan/(:any)']  = "layanan/read/$1";

// Route Page
$route['page'] = 'page';
$route['page/index'] = 'page';
$route['page/(:any)']     = "page/read/$1";

//Sitemap XML

$route['sitemap\.xml'] = "sitemap/index";
