<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*
|--------------------------------------------------------------------------
| howepage Routes
|--------------------------------------------------------------------------
*/


route::get('/','portalController@register');


/*
|--------------------------------------------------------------------------
| /.howepage Routes
|--------------------------------------------------------------------------
*/


route::get('/admin','adminController@index');

route::get('/admin/catagery','adminController@catagery');

route::post('/admin/catsaving','adminController@store');

route::post('/admin/editcat','adminController@update');

route::post('/admin/delete','adminController@destroy');



// This for Manage exam route


route::get('/admin/manage_exam','adminController@manage_exam');

route::post('/admin/examsaving','adminController@examsaving');

route::post('/admin/exam_edit','adminController@exam_edit');

route::post('/admin/exam_delete','adminController@exam_delete');

route::get('/admin/manage_student','adminController@manage_student');

route::get('/admin/portal','adminController@portal');


// This for Portal deshboard route


route::get('/portal/dashboard','portal_operationController@dashboard');

route::get('/student/form','portal_operationController@form');


// This for Portal route


route::get('/student/login','portalController@login');

route::get('/student/register','portalController@register');

route::post('/student/registered','portalController@registered');

route::post('/student/slogin','portalController@slogin');




/*
|--------------------------------------------------------------------------
| Auth Work route
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/home', 'adminController@index');

/*
|--------------------------------------------------------------------------
| /.Auth Work route
|--------------------------------------------------------------------------
*/