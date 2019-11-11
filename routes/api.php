<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, api_key, Authorization');

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'Services alive!'
    ]);
});

# Get Tweets by Hashtag
Route::get('/v1/tweets/hashtag/{hashtag?}', 'TweetController@getTweetByHashtag');

# Transform and Save data to analyze
Route::get('/v1/tweets/batch-save', 'TweetController@batchSaveTweets');

# Rest API
Route::get('/v1/tweets', 'TweetController@index')->name('api.index');
Route::get('/v1/total/hour', 'TweetController@getTotalPostsByHour')->name('api.total.hour');
Route::get('/v1/total/hashtag/lang/local', 'TweetController@getTotalPostsByHashtagLangLocal')->name('api.total.tag.lang.local');
Route::get('/v1/top/users', 'TweetController@getTop5UsersByFollowers')->name('api.top.users');
