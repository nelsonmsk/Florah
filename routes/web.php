<?php


/*
|---------
| Web Routes
|-----
|

| Here is where you can register web routes for your application. These
|
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. |
|Now create something great!
|
*/


//Auth::routes();
Route::resource('/','TemplateController');

Route::resource('home','TemplateController');
Route::get('/AppDefaults','TemplateController@getTemplate');

Route::get('/login/','Auth\LoginController@getLogin');
Route::post('/login','Auth\LoginController@postLogin')->name('login');
Route::post('/logout','Auth\LoginController@logout');


Route::group(['middleware' => ['auth']],  function(){

	Route::resource('/users', 'UserController');

	Route::get('/page-home', function () {

		return View('/page-home');
	});
	
	Route::get('/Dashboard','DashboardController@getView');
	Route::get('cart','DashboardController@getCart');
	Route::get('list','DashboardController@getList');
	Route::get('checkoutCart','DashboardController@checkoutCart');	
	Route::get('checkoutList','DashboardController@checkoutList');		
	Route::get('contract','DashboardController@contract');		
	Route::resource('dashboard','DashboardController');

	Route::resource('/profiles/create', 'ProfilesController@create');
	Route::resource('/profiles/create', 'ProfilesController@store');
	Route::resource('/profiles', 'ProfilesController');

	Route::get('/appDefaults/create','AppDefaultsController@create');
	Route::post('/appDefaults/create','AppDefaultsController@store');
	Route::resource('/appDefaults', 'AppDefaultsController');

	Route::get('/messages/create','MessagesController@create');
	Route::post('/messages/create','MessagesController@store');
	Route::resource('/messages', 'MessagesController');

	Route::get('/galleryImages/create','GalleryImagesController@create');
	Route::post('/galleryImages/create','GalleryImagesController@store');
	Route::resource('/galleryImages', 'GalleryImagesController');

	Route::get('/bouquets/create','BouquetsController@create');
	Route::post('/bouquets/create','BouquetsController@store');
	Route::resource('/bouquets', 'BouquetsController');

	Route::get('/bouquetTypes/create','BouquetTypesController@create');
	Route::post('/bouquetTypes/create','BouquetTypesController@store');
	Route::resource('/bouquetTypes', 'BouquetTypesController');

	Route::get('/flowers/create','FlowersController@create');
	Route::post('/flowers/create','FlowersController@store');
	Route::resource('/flowers', 'FlowersController');

	Route::get('/flowerTypes/create','FlowerTypesController@create');
	Route::post('/flowerTypes/create','FlowerTypesController@store');
	Route::resource('/flowerTypes', 'FlowerTypesController');
	
	Route::get('/florists/create','FloristsController@create');
	Route::post('/florists/create','FloristsController@store');
	Route::resource('/florists', 'FloristsController');

	Route::get('/orders/create','OrdersController@create');
	Route::post('/orders/create','OrdersController@store');
	Route::resource('/orders', 'OrdersController');

	Route::get('/hires/create','HiresController@create');
	Route::post('/hires/create','HiresController@store');
	Route::resource('/hires', 'HiresController');

	Route::get('/projects/create','ProjectsController@create');
	Route::post('/projects/create','ProjectsController@store');
	Route::resource('/projects', 'ProjectsController');

	Route::get('/projectTypes/create','ProjectTypesController@create');
	Route::post('/projectTypes/create','ProjectTypesController@store');
	Route::resource('/projectTypes', 'ProjectTypesController');
	
	Route::get('/tasks/create','TasksController@create');
	Route::post('/tasks/create','TasksController@store');
	Route::resource('/tasks', 'TasksController');	

	Route::get('/plans/create','PlansController@create');
	Route::post('/plans/create','PlansController@store');
	Route::resource('/plans', 'PlansController');

	Route::get('/testimonials/create','TestimonialsController@create');
	Route::post('/testimonials/create','TestimonialsController@store');
	Route::resource('/testimonials', 'TestimonialsController');

	Route::get('/banners/create','BannersController@create');
	Route::post('/banners/create','BannersController@store');
	Route::resource('/banners', 'BannersController');

	Route::get('/features/create','FeaturesController@create');
	Route::post('/features/create','FeaturesController@store');
	Route::resource('/features', 'FeaturesController');

	Route::get('/services/create','ServicesController@create');
	Route::post('/services/create','ServicesController@store');	
	Route::resource('/services', 'ServicesController');

	Route::get('/clients/create','ClientsController@create');
	Route::post('/clients/create','ClientsController@store');
	Route::resource('/clients', 'ClientsController');

	Route::get('/emails/create','MailsController@create');
	Route::post('/emails/create','MailsController@store');
	Route::post('/emails/preview','MailsController@preview');
	Route::post('/emails/send','MailsController@send');	
	Route::resource('/emails', 'MailsController');
	
	Route::get('/newsletters/create','NewslettersController@create');
	Route::post('/newsletters/create','NewslettersController@store');
	Route::post('/newsletters/preview','NewslettersController@preview');
	Route::post('/newsletters/send','NewslettersController@send');	
	Route::resource('/newsletters', 'NewslettersController');	
	
	Route::get('/notifications/show','NotificationsController@show');
	Route::resource('/notifications', 'NotificationsController');

	Route::get('/subsReports/create','SubsReportsController@create');
	Route::post('/subsReports/create','SubsReportsController@create');	
	Route::post('/subsReports/preview','SubsReportsController@preview');
	Route::post('/subsReports/pdfreport','SubsReportsController@displayReport');
	Route::resource('/subsReports', 'SubsReportsController');

	Route::get('/projectsReports/create','ProjectsReportsController@create');
	Route::post('/projectsReports/create','ProjectsReportsController@create');	
	Route::post('/projectsReports/preview','ProjectsReportsController@preview');
	Route::post('/projectsReports/pdfreport','ProjectsReportsController@displayReport');
	Route::resource('/projectsReports', 'ProjectsReportsController');

	Route::get('/messagesReports/create','MessagesReportsController@create');
	Route::post('/messagesReports/create','MessagesReportsController@create');	
	Route::post('/messagesReports/preview','MessagesReportsController@preview');
	Route::post('/messagesReports/pdfreport','MessagesReportsController@displayReport');
	Route::resource('/messagesReports', 'MessagesReportsController');

	Route::get('/clientsReports/create','ClientsReportsController@create');
	Route::post('/clientsReports/create','ClientsReportsController@create');	
	Route::post('/clientsReports/preview','ClientsReportsController@preview');
	Route::post('/clientsReports/pdfreport','ClientsReportsController@displayReport');
	Route::resource('/clientsReports', 'ClientsReportsController');	
	
	Route::get('/usersReports/create','UsersReportsController@create');
	Route::post('/usersReports/create','UsersReportsController@create');	
	Route::post('/usersReports/preview','UsersReportsController@preview');
	Route::post('/usersReports/pdfreport','UsersReportsController@displayReport');
	Route::resource('/usersReports', 'UsersReportsController');


});
