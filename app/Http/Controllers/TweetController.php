<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tweet::all();
    }

    public function getTweetByHashtag($hashtag)
    {
        $time_start = microtime(true);

        if (!$hashtag) {
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
                'message' => 'Success!',
                'time_start' => $time_start,
                'time_end' => $time_end,
                'execution_time' => number_format($time_end - $time_start, 2) . ' segundos', 'total' => count($data),
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
                'message' => 'Success!',
                'time_start' => $time_start,
                'time_end' => $time_end,
                'execution_time' => number_format($time_end - $time_start, 2) . ' segundos',
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
                'message' => 'Success!',
                'time_start' => $time_start,
                'time_end' => $time_end,
                'execution_time' => number_format($time_end - $time_start, 2) . ' segundos',
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
                'message' => 'Success!',
                'time_start' => $time_start,
                'time_end' => $time_end,
                'execution_time' => number_format($time_end - $time_start, 2) . ' segundos',
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
            $data = Tweet::getTotalPostsByHashtagLangLocal();
            $time_end = microtime(true);

            return response()->json([
                'success' => true,
                'message' => 'Success!',
                'time_start' => $time_start,
                'time_end' => $time_end,
                'execution_time' => number_format($time_end - $time_start, 2) . ' segundos',
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
