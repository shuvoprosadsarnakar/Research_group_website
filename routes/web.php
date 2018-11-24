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

//home / starting page
Route::get('/', [

    'uses'=>'HomeController@index',
    'as'=>'home'

]);

//posts start
Route::get('/posts',[
    'uses' => 'PostController@index',
    'as' => 'posts'
]);

Route::get('/posts/{criteria}/{order}',[
    'uses' => 'PostController@orderedIndex',
    'as' => 'posts_order'
]);

Route::get('/post/create/{criteria}/{order}',[
    'uses' => 'PostController@create',
    'as' => 'post_create'
]);

Route::post('/post/store',[
    'uses' => 'PostController@store',
    'as' => 'post_store'
]);

Route::get('/post/details/{id}',[
    'uses' => 'PostController@show',
    'as' => 'post_details'
]);

Route::get('/post/delete/{id}',[
    'uses' => 'PostController@destroy',
    'as' => 'post_delete'
]);

Route::get('/post/edit/{id}',[
    'uses' => 'PostController@edit',
    'as' => 'post_edit'
]);
//posts end

//members start
Route::get('/members',[
    'uses' => 'MemberController@index',
    'as' => 'members'
]);


Route::get('/member/{criteria}/{order}',[
    'uses' => 'MemberController@orderedIndex',
    'as' => 'member_order'
]);

Route::get('/member/create',[
    'uses' => 'MemberController@create',
    'as' => 'member_create'
]);

Route::post('/member/store',[
    'uses' => 'MemberController@store',
    'as' => 'member_store'
]);

Route::get('/member/details/{id}',[
    'uses' => 'MemberController@show',
    'as' => 'member_details'
]);

Route::get('/member/delete/{id}',[
    'uses' => 'MemberController@destroy',
    'as' => 'member_delete'
]);

Route::get('/member/edit/{id}',[
    'uses' => 'MemberController@edit',
    'as' => 'member_edit'
]);
//members end

//type start
// Route::get('/types',[
//     'uses' => 'TypeController@index',
//     'as' => 'types'
// ]);


// Route::get('/type/{criteria}/{order}',[
//     'uses' => 'TypeController@orderedIndex',
//     'as' => 'type_order'
// ]);

Route::get('/type/create',[
    'uses' => 'TypeController@create',
    'as' => 'type_create'
]);

Route::post('/type/store',[
    'uses' => 'TypeController@store',
    'as' => 'type_store'
]);

// Route::get('/type/details/{id}',[
//     'uses' => 'TypeController@show',
//     'as' => 'type_details'
// ]);

Route::get('/type/delete/{id}',[
    'uses' => 'TypeController@destroy',
    'as' => 'type_delete'
]);

Route::get('/type/edit/{id}',[
    'uses' => 'TypeController@edit',
    'as' => 'type_edit'
]);
//type end

//image start
// Route::get('/image',[
//     'uses' => 'ImageController@index',
//     'as' => 'image'
// ]);


// Route::get('/type/{criteria}/{order}',[
//     'uses' => 'ImageController@orderedIndex',
//     'as' => 'image_order'
// ]);

Route::get('/image/create',[
    'uses' => 'ImageController@create',
    'as' => 'image_create'
]);

Route::post('/image/store',[
    'uses' => 'TypeController@store',
    'as' => 'image_store'
]);

// Route::get('/image/details/{id}',[
//     'uses' => 'ImageController@show',
//     'as' => 'image_details'
// ]);

Route::get('/image/delete/{id}',[
    'uses' => 'ImageController@destroy',
    'as' => 'image_delete'
]);

Route::get('/image/edit/{id}',[
    'uses' => 'ImageController@edit',
    'as' => 'image_edit'
]);
//image end

//video start
// Route::get('/video',[
//     'uses' => 'VideoController@index',
//     'as' => 'video'
// ]);


// Route::get('/video/{criteria}/{order}',[
//     'uses' => 'VideoController@orderedIndex',
//     'as' => 'image_order'
// ]);

Route::get('/video/create',[
    'uses' => 'VideoController@create',
    'as' => 'video_create'
]);

Route::post('/video/store',[
    'uses' => 'VideoController@store',
    'as' => 'video_store'
]);

// Route::get('/video/details/{id}',[
//     'uses' => 'VideoController@show',
//     'as' => 'video_details'
// ]);

Route::get('/video/delete/{id}',[
    'uses' => 'VideoController@destroy',
    'as' => 'video_delete'
]);

Route::get('/video/edit/{id}',[
    'uses' => 'VideoController@edit',
    'as' => 'video_edit'
]);
//video end




Route::get('/publications', [

    'uses'=>'PublicationsController@index',
    'as'=>'publications'
]);

Route::get('/admin', [

    'uses'=>'AdminController@index',
    'as'=>'admin'

]);

Route::post('/adminlogin', [

    'uses'=>'AdminController@login'

]);

Route::post('/adminlogout', [

    'uses'=>'AdminController@logout',
    'as'=>'logout'

]);

Route::get('/admindashboard', [

    'uses'=>'AdminController@dashboard'

]);

Route::get('/admindashboard2', [

    'uses'=>'AdminController@dashboard2'

]);

Route::get('/admindashboard3', [

    'uses'=>'AdminController@dashboard3'

]);

Route::get('/admindashboard4', [

    'uses'=>'AdminController@dashboard4'

]);
Route::get('/admindashboard5', [

    'uses'=>'AdminController@dashboard5'

]);


//publication start
Route::post('/create/publications', [
    
    'uses'=>'AdminController@dbpublications'
    
]);

Route::get('/delete/publications/{id}', [
    
    'uses'=>'AdminController@deletepublications',
    'as'=>'delete.publications'
    
]);

Route::get('/update/publications/{id}', [
    
    'uses'=>'AdminController@updatepublications',
    'as'=>'update.publications'
    
]);
Route::post('/save/publications/{id}', [
    
    'uses'=>'AdminController@savepublications',
    'as'=>'save.publications'
    
]);
Route::post('/search/publications', [
    
    'uses'=>'AdminController@searchpublications',
    'as'=>'search.publications'
    
]);
//publication end



//member details
Route::get('/memberdetail/{id}', [
    
    'uses'=>'MembersController@memberdetail',
    'as'=>'memberdetail'
    
]);

   //contact view     
Route::get('/contact', [
        
    'uses'=>'ContactController@index'
        
]);
Route::post('/contact', [
        
    'uses'=>'ContactController@email'
        
]);

// project view
Route::get('/project', [
    
    'uses'=>'ProjectController@index',
    'as'=>'project'
    
]);

//project details start
Route::get('/projectdetails/{id}', [
    
    'uses'=>'ProjectController@projectdetails'
    
]);

Route::post('/create/project', [
    
    'uses'=>'ProjectController@createproject'
    
]);
Route::get('/delete/project/{id}', [
    
    'uses'=>'ProjectController@deleteproject',
    'as'=>'delete.project'
]);
Route::get('/update/project/{id}', [
    
    'uses'=>'ProjectController@updateproject',
    'as'=>'update.project'
]);
Route::post('/save/project/{id}', [
    
    'uses'=>'ProjectController@saveproject',
    'as'=>'save.project'
]);
//project end



//Open position start
Route::get('openpositions', [
    
    'uses'=>'OpenpositionController@index',
    
]);
Route::post('/create/Openposition', [
    
    'uses'=>'OpenpositionController@createOpenposition'
    
]);
Route::get('/delete/Openposition/{id}', [
    
    'uses'=>'OpenpositionController@deleteOpenposition',
    'as'=>'delete.Openposition'
]);
Route::get('/update/Openposition/{id}', [
    
    'uses'=>'OpenpositionController@updateOpenposition',
    'as'=>'update.Openposition'
]);
Route::post('/save/Openposition/{id}', [
    
    'uses'=>'OpenpositionController@saveOpenposition',
    'as'=>'save.Openposition'
]);


Route::get('deliverable', [
    
    'uses'=>'DeliverableController@index',
    'as'=>'deliverable'
]);
Route::post('/create/deliverable', [
    
    'uses'=>'DeliverableController@createdeliverable'
    
]);
Route::get('/delete/deliverable/{id}', [
    
    'uses'=>'DeliverableController@deletedeliverable',
    'as'=>'delete.deliverable'
]);
Route::get('/update/deliverable/{id}', [
    
    'uses'=>'DeliverableController@updatedeliverable',
    'as'=>'update.deliverable'
]);
Route::post('/save/deliverable/{id}', [
    
    'uses'=>'DeliverableController@savedeliverable',
    'as'=>'save.deliverable'
]);
