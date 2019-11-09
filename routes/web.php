<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

use App\Tweet;

Route::get('/', function () {
    return view('welcome');
});

# Render Views
Route::get('/tweets', function () {
    return view('list', ['tweets' => Tweet::paginate(15)]);
})->name('web.index');

Route::get('/total/hour', function () {
    return view('list-total-hour', ['tweets' => Tweet::getTotalPostsByHour()]);
})->name('web.total.hour');

Route::get('/total/hashtag/lang/local', function () {
    return view('list-total-hashtag-lang-local', ['tweets' => Tweet::getTotalPostsByHashtagLangLocal()->paginate(15)]);
})->name('web.total.tag.lang.local');

Route::get('/top/users', function () {
    return view('list-top-user', ['tweets' => Tweet::getTop5UsersByFollowers()]);
})->name('web.top.users');
