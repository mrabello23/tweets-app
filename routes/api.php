<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'Services alive!'
    ]);
});

Route::get('/v1/tweets/hashtag/{hashtag}', 'TweetController@getTweetByHashtag');
Route::get('/v1/tweets/batch-save', 'TweetController@batchSaveTweets');
Route::get('/v1/tweets', 'TweetController@index');
Route::get('/v1/total/hour', 'TweetController@getTotalPostsByHour');
Route::get('/v1/total/hashtag/lang/local', 'TweetController@getTotalPostsByHashtagLangLocal');
Route::get('/v1/top/users', 'TweetController@getTop5UsersByFollowers');
