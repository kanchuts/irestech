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
// $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'user/login';
$route['logout'] = 'user/logout';

$route['dashboard'] = 'admin/index';

// category
$route['category'] = 'categories/index';
$route['addCategory'] = 'categories/create'; 
$route['deleteCategory/(:any)'] = 'categories/delete/$1';

// tag
$route['tag'] = 'tags/index';
$route['addTag'] = 'tags/create';
$route['deleteTag/(:any)'] = 'tags/delete/$1';

// post
$route['post'] = 'posts/index';
$route['addPost'] ='posts/create';
$route['editPost/(:any)'] = 'posts/update/$1';
$route['deletePost/(:any)'] = 'posts/delete/$1';

//event
$route['event'] = 'events/index';
$route['addEvent'] ='events/create';
$route['editEvent/(:any)'] = 'events/update/$1';
$route['deleteEvent/(:any)'] = 'events/delete/$1';

//comment
$route['comment'] = 'comments/index';
$route['deleteComment/(:any)'] = 'comments/delete/$1';	

//contact
$route['contacts'] = 'contact/index';
$route['deleteContact/(:any)'] = 'contact/delete/$1';

//ui
$route['default_controller'] = 'front/index';
$route['upcoming'] = 'front/upcoming';
$route['singleEvent/(:any)'] = 'front/upcome/$1';
$route['news'] = 'front/blog';
$route['singleBlog/(:any)'] = 'front/single/$1';
$route['contact'] = 'front/contact';

