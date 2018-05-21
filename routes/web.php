<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


//frontend
Route::get('/', 'SiteController@index');
Route::get('/about', 'SiteController@about');
Route::get('about/technical-equipment', [
  'as' => 'technical', 'uses' => 'SiteController@technical'
]);
Route::get('about/certificates', 'SiteController@certificates');
Route::get('/products', 'SiteController@products');
Route::get('/products/{categories?}/{child?}', 'SiteController@products');
Route::post('/callback', 'SiteController@callback');

Route::get('/galleries', 'SiteController@galleries');
Route::get('/contacts', 'SiteController@contacts');
Route::get('/product', 'SiteController@pro');

Auth::routes();
Route::get('/admin', 'HomeController@index');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
	Route::resource('categories', 'CategoryController');	
});

Route::get('backend/contacts', ['as'=> 'backend.contacts.index', 'uses' => 'Backend\ContactController@index']);
Route::post('backend/contacts', ['as'=> 'backend.contacts.store', 'uses' => 'Backend\ContactController@store']);
Route::get('backend/contacts/create', ['as'=> 'backend.contacts.create', 'uses' => 'Backend\ContactController@create']);
Route::put('backend/contacts/{contacts}', ['as'=> 'backend.contacts.update', 'uses' => 'Backend\ContactController@update']);
Route::patch('backend/contacts/{contacts}', ['as'=> 'backend.contacts.update', 'uses' => 'Backend\ContactController@update']);
Route::delete('backend/contacts/{contacts}', ['as'=> 'backend.contacts.destroy', 'uses' => 'Backend\ContactController@destroy']);
Route::get('backend/contacts/{contacts}', ['as'=> 'backend.contacts.show', 'uses' => 'Backend\ContactController@show']);
Route::get('backend/contacts/{contacts}/edit', ['as'=> 'backend.contacts.edit', 'uses' => 'Backend\ContactController@edit']);


Route::get('backend/galleries', ['as'=> 'backend.galleries.index', 'uses' => 'Backend\GalleryController@index']);
Route::post('backend/galleries', ['as'=> 'backend.galleries.store', 'uses' => 'Backend\GalleryController@store']);
Route::get('backend/galleries/create', ['as'=> 'backend.galleries.create', 'uses' => 'Backend\GalleryController@create']);
Route::put('backend/galleries/{galleries}', ['as'=> 'backend.galleries.update', 'uses' => 'Backend\GalleryController@update']);
Route::patch('backend/galleries/{galleries}', ['as'=> 'backend.galleries.update', 'uses' => 'Backend\GalleryController@update']);
Route::delete('backend/galleries/{galleries}', ['as'=> 'backend.galleries.destroy', 'uses' => 'Backend\GalleryController@destroy']);
Route::get('backend/galleries/{galleries}', ['as'=> 'backend.galleries.show', 'uses' => 'Backend\GalleryController@show']);
Route::get('backend/galleries/{galleries}/edit', ['as'=> 'backend.galleries.edit', 'uses' => 'Backend\GalleryController@edit']);


Route::get('backend/abouts', ['as'=> 'backend.abouts.index', 'uses' => 'Backend\AboutController@index']);
Route::post('backend/abouts', ['as'=> 'backend.abouts.store', 'uses' => 'Backend\AboutController@store']);
Route::get('backend/abouts/create', ['as'=> 'backend.abouts.create', 'uses' => 'Backend\AboutController@create']);
Route::put('backend/abouts/{abouts}', ['as'=> 'backend.abouts.update', 'uses' => 'Backend\AboutController@update']);
Route::patch('backend/abouts/{abouts}', ['as'=> 'backend.abouts.update', 'uses' => 'Backend\AboutController@update']);
Route::delete('backend/abouts/{abouts}', ['as'=> 'backend.abouts.destroy', 'uses' => 'Backend\AboutController@destroy']);
Route::get('backend/abouts/{abouts}', ['as'=> 'backend.abouts.show', 'uses' => 'Backend\AboutController@show']);
Route::get('backend/abouts/{abouts}/edit', ['as'=> 'backend.abouts.edit', 'uses' => 'Backend\AboutController@edit']);


Route::resource('technicalEquipments', 'TechnicalEquipmentController');

Route::get('backend/backgrounds', ['as'=> 'backend.backgrounds.index', 'uses' => 'Backend\BackgroundController@index']);
Route::post('backend/backgrounds', ['as'=> 'backend.backgrounds.store', 'uses' => 'Backend\BackgroundController@store']);
Route::get('backend/backgrounds/create', ['as'=> 'backend.backgrounds.create', 'uses' => 'Backend\BackgroundController@create']);
Route::put('backend/backgrounds/{backgrounds}', ['as'=> 'backend.backgrounds.update', 'uses' => 'Backend\BackgroundController@update']);
Route::patch('backend/backgrounds/{backgrounds}', ['as'=> 'backend.backgrounds.update', 'uses' => 'Backend\BackgroundController@update']);
Route::delete('backend/backgrounds/{backgrounds}', ['as'=> 'backend.backgrounds.destroy', 'uses' => 'Backend\BackgroundController@destroy']);
Route::get('backend/backgrounds/{backgrounds}', ['as'=> 'backend.backgrounds.show', 'uses' => 'Backend\BackgroundController@show']);
Route::get('backend/backgrounds/{backgrounds}/edit', ['as'=> 'backend.backgrounds.edit', 'uses' => 'Backend\BackgroundController@edit']);


Route::get('backend/certificates', ['as'=> 'backend.certificates.index', 'uses' => 'Backend\CertificateController@index']);
Route::post('backend/certificates', ['as'=> 'backend.certificates.store', 'uses' => 'Backend\CertificateController@store']);
Route::get('backend/certificates/create', ['as'=> 'backend.certificates.create', 'uses' => 'Backend\CertificateController@create']);
Route::put('backend/certificates/{certificates}', ['as'=> 'backend.certificates.update', 'uses' => 'Backend\CertificateController@update']);
Route::patch('backend/certificates/{certificates}', ['as'=> 'backend.certificates.update', 'uses' => 'Backend\CertificateController@update']);
Route::delete('backend/certificates/{certificates}', ['as'=> 'backend.certificates.destroy', 'uses' => 'Backend\CertificateController@destroy']);
Route::get('backend/certificates/{certificates}', ['as'=> 'backend.certificates.show', 'uses' => 'Backend\CertificateController@show']);
Route::get('backend/certificates/{certificates}/edit', ['as'=> 'backend.certificates.edit', 'uses' => 'Backend\CertificateController@edit']);


Route::get('backend/textBlocks', ['as'=> 'backend.textBlocks.index', 'uses' => 'Backend\textBlocksController@index']);
Route::post('backend/textBlocks', ['as'=> 'backend.textBlocks.store', 'uses' => 'Backend\textBlocksController@store']);
Route::get('backend/textBlocks/create', ['as'=> 'backend.textBlocks.create', 'uses' => 'Backend\textBlocksController@create']);
Route::put('backend/textBlocks/{textBlocks}', ['as'=> 'backend.textBlocks.update', 'uses' => 'Backend\textBlocksController@update']);
Route::patch('backend/textBlocks/{textBlocks}', ['as'=> 'backend.textBlocks.update', 'uses' => 'Backend\textBlocksController@update']);
Route::delete('backend/textBlocks/{textBlocks}', ['as'=> 'backend.textBlocks.destroy', 'uses' => 'Backend\textBlocksController@destroy']);
Route::get('backend/textBlocks/{textBlocks}', ['as'=> 'backend.textBlocks.show', 'uses' => 'Backend\textBlocksController@show']);
Route::get('backend/textBlocks/{textBlocks}/edit', ['as'=> 'backend.textBlocks.edit', 'uses' => 'Backend\textBlocksController@edit']);
