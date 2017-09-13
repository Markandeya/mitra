<?php
/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'ajax',], function () {

  Route::get('/search-user', 'SearchController@search');
  Route::get('/check-relationship-status/{id}','FriendController@check')->name('check');
  Route::get('/add-friend/{id}','FriendController@addFriend')->name('add-friend');
  Route::get('/accept-friend/{id}','FriendController@acceptFriend')->name('accept-friend');
  Route::get('/get-unread', function() {
    return Auth::user()->unreadNotifications;
  });
});
