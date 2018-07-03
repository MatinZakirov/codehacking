<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post', 'uses' => 'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function (){

        return view('admin.index');
    });


    Route::resource('admin/users', 'AdminUsersController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'

    ]]);
    Route::resource('admin/posts', 'AdminPostsController', ['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit'

    ]]);
    Route::resource('admin/categories', 'AdminCategoriesController',  ['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit'

    ]]);


    Route::post('admin/media/delete', 'AdminMediaController@deleteMedia');
    Route::resource('admin/media', 'AdminMediaController',  ['names'=>[

        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit'

    ]]);


    Route::resource('admin/comments', 'CommentsController',  ['names'=>[

        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
            'show'=>'admin.comments.show'

    ]]
    );
    Route::resource('admin/comments/replies', 'CommentRepliesController',  ['names'=>[

        'index'=>'admin.comments.replies.index',
        'create'=>'admin.comments.replies.create',
        'store'=>'admin.comments.replies.store',
        'edit'=>'admin.comments.replies.edit'

    ]]);

});



Route::group(['middleware'=>'auth'], function (){

    Route::post('/comments/replies', 'CommentRepliesController@createReply');

});
