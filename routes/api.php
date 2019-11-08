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

Route::get('/tweets/hashtag/{hashtag}', 'TweetController@getTweetByHashtag');
