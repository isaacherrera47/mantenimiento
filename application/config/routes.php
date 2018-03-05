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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['mantenimiento/mecanicos'] = 'mantenimiento/mecanico_controller/index';
$route['mantenimiento/servicios/internos'] = 'mantenimiento/servicio_controller/internos';
$route['mantenimiento/servicios/externos'] = 'mantenimiento/servicio_controller/externos';
$route['mantenimiento/servicios/(:num)'] = 'mantenimiento/servicio_controller/servicio_detalle/$1';
$route['mantenimiento/refacciones'] = 'mantenimiento/refaccion_controller/index';
$route['mantenimiento/refacciones/(:num)'] = 'mantenimiento/refaccion_controller/refaccion_proveedor/$1';
$route['mantenimiento/proveedores'] = 'mantenimiento/proveedor_controller/index';
$route['mantenimiento/proveedores/(:num)'] = 'mantenimiento/proveedor_controller/proveedor_refaccion/$1';
$route['mantenimiento/ordenes/en-ruta'] = 'mantenimiento/orden_controller/en_ruta';
$route['mantenimiento/ordenes/manual'] = 'mantenimiento/orden_controller/manual';
$route['mantenimiento/ordenes/manual/(:num)'] = 'mantenimiento/orden_controller/manual_detalle/$';

// API
$route['api/mecanicos'] = 'mantenimiento/api/mecanicos';
$route['api/refacciones'] = 'mantenimiento/api/refacciones';
$route['api/refacciones-proveedores'] = 'mantenimiento/api/refacciones_proveedores';
$route['api/proveedores'] = 'mantenimiento/api/proveedores';
$route['api/servicios'] = 'mantenimiento/api/servicios';
$route['api/servicios-proveedores'] = 'mantenimiento/api/servicios_proveedores';
$route['api/servicios-refacciones'] = 'mantenimiento/api/servicios_refacciones';
$route['api/ordenes'] = 'mantenimiento/api/ordenes';

