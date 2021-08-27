<?php

Route::redirect('/', '/flarum');

Route::get('/flarum', 'PagesController@root')->name('root');

Route::prefix('flarum')->group(function () {
    Auth::routes();

    Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

    Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

    Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

    Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

    Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
    // 子话题回复
    Route::post('subreplies', 'RepliesController@subrepliestore')->name('subreplies.store');

    Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);

    Route::get('announcements', 'AnnouncementController@show')->name('announcements.show');
});

// 话题点赞
Route::get('topic/like/{topic}', 'TopicsController@toggleLike')->name('topic.togglelike');
// 话题收藏
Route::get('topic/collect/{topic}', 'TopicsController@toggleCollect')->name('topic.togglecollect');
// 话题点赞
Route::get('reply/like/{reply}', 'RepliesController@toggleLike')->name('reply.togglelike');

Route::get('admin', 'Admin\AdminController@index')->name('admin.index');

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::resource('users', 'Admin\UsersController', ['except' => ['create', 'store', 'show']]);
        Route::resource('topics', 'Admin\TopicsController', ['except' => ['create', 'store', 'show']]);
        Route::resource('replies', 'Admin\RepliesController', ['except' => ['create', 'store', 'show']]);
        Route::resource('categories', 'Admin\CategoriesController');
        Route::resource('advertises', 'Admin\AdvertisesController', ['except' => ['show', 'create', 'store', 'destroy']]);
        Route::resource('announcements', 'AnnouncementController', ['except' => ['show', 'create', 'store', 'destroy']]);

        Route::get('login', 'Admin\AdminController@create')->name('login');
        Route::post('login', 'Admin\AdminController@store')->name('login');
        Route::delete('logout', 'Admin\AdminController@logout')->name('logout');
    });
});
