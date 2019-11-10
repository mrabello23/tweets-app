<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TweetController extends Controller
{
    public function index()
    {
        Log::info('Acessou API - Todos os Tweets');

        $time_start = microtime(true);
        $data = Tweet::all();
        $time_end = microtime(true);

        return response()->json([
            'success' => true,
            'request_time_start' => $time_start,
            'request_time_end' => $time_end,
            'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
            'total' => count($data),
            'data' => $data
        ]);
    }

    public function getTweetByHashtag($hashtag = false)
    {
        $time_start = microtime(true);

        if (!$hashtag || strlen($hashtag) < 2) {
            return response()->json([
                'success' => false,
                'message' => 'Bad Request: invalid hashtag'
            ], 400);
        }

        try {
            $data = Tweet::getTweetsByHashtag($hashtag);
            $time_end = microtime(true);

            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function batchSaveTweets()
    {
        $time_start = microtime(true);

        $hashtags = [
            'openbanking',
            'apifirst',
            'devops',
            'cloudfirst',
            'microservices',
            'apigateway',
            'oauth',
            'swagger',
            'raml',
            'openapis',
        ];

        try {
            $tweet = new Tweet;
            $tweet->batchSaveTweetsByHashtag($hashtags);
            $time_end = microtime(true);

            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function getTop5UsersByFollowers()
    {
        $time_start = microtime(true);

        try {
            $data = Tweet::getTop5UsersByFollowers();
            $time_end = microtime(true);

            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function getTotalPostsByHour()
    {
        $time_start = microtime(true);

        try {
            $data = Tweet::getTotalPostsByHour();
            $time_end = microtime(true);

            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function getTotalPostsByHashtagLangLocal()
    {
        $time_start = microtime(true);

        try {
            $data = Tweet::getTotalPostsByHashtagLangLocal()->get()->toArray();
            $time_end = microtime(true);

            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }
}
