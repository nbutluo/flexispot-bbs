<?php

Route::redirect('/', '/forum');

Route::get('/forum', 'PagesController@root')->name('root');

// 用户身份验证相关的路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
 // Email 认证相关路由
 Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
 Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
 Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::prefix('forum')->group(function () {
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
