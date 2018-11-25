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
    'uses' => 'MemberController@memberList',
    'as' => 'members'
]);

Route::get('/member/create',[
    'uses' => 'MemberController@add_member',
    'as' => 'member_create'
]);

Route::post('/member/store',[
    'uses' => 'MemberController@insertMember',
    'as' => 'member_store'
]);

Route::get('/memberDetails/{id}',[
    'uses' => 'MemberController@memberDetails',
    'as' => 'memberDetails'
]);
Route::get('/deleteMember/{id}', 'MemberController@deleteMember')->name('deleteMember');

Route::get('/editMember/{id}', 'MemberController@editMember')->name('editMember');

Route::post('/updateMember/{id}', 'MemberController@updateMember')->name('updateMember');
//members end

//group star
Route::get('/groups',[
    'uses' => 'GroupController@create',
    'as' => 'group_create'
]);

Route::post('/group/store',[
    'uses' => 'GroupController@store',
    'as' => 'group_store'
]);

Route::get('/group/edit/{id}',[
    'uses' => 'GroupController@edit',
    'as' => 'group_edit'
]);

Route::post('/group/update/{id}',[
    'uses' => 'GroupController@update',
    'as' => 'group_update'
]);

Route::get('/group/delete/{id}',[
    'uses' => 'GroupController@destroy',
    'as' => 'group_delete'
]);

Route::post('/groupmembers/store',[
    'uses' => 'GroupController@gmStore',
    'as' => 'gm_store'
]);

Route::get('/groupmembers/edit/{id}',[
    'uses' => 'GroupController@gmEdit',
    'as' => 'gm_edit'
]);

Route::post('/groupmembers/update/{id}',[
    'uses' => 'GroupController@gmUpdate',
    'as' => 'gm_update'
]);

//group end

//start reference
Route::get('/references',[
    'uses' => 'ReferenceController@create',
    'as' => 'reference_create'
]);

Route::post('/reference/store',[
    'uses' => 'ReferenceController@store',
    'as' => 'reference_store'
]);

Route::get('/reference/edit/{id}',[
    'uses' => 'ReferenceController@edit',
    'as' => 'reference_edit'
]);

Route::post('/reference/update/{id}',[
    'uses' => 'ReferenceController@update',
    'as' => 'reference_update'
]);

Route::get('/reference/delete/{id}',[
    'uses' => 'ReferenceController@destroy',
    'as' => 'reference_delete'
]);
//end reference

//type start
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
Route::post('/type/update/{id}',[
    'uses' => 'TypeController@update',
    'as' => 'type_update'
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



Route::get('/admin', [

    'uses'=>'AdminController@index',
    'as'=>'admin'

]);

//start admin panel
Route::post('/adminlogin', [

    'uses'=>'AdminController@login'

]);

Route::post('/adminlogout', [

    'uses'=>'AdminController@logout',
    'as'=>'logout'

]);
//end admin panel

//contact view     
Route::get('/contact', [
        
    'uses'=>'ContactController@index',
    'as'=>'contact'
        
]);
Route::post('/contact', [
        
    'uses'=>'ContactController@email'
        
]);

