<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TweetController extends Controller
{
    private $ipAddr;
    private $userAgent;
    private $requestMethod;
    private $queryString;

    public function __construct()
    {
        $this->ipAddr = $_SERVER['REMOTE_ADDR'] . ':' . $_SERVER['REMOTE_PORT'];
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->queryString = $_SERVER['QUERY_STRING'];
    }

    public function index()
    {
        $time_start = microtime(true);
        Log::debug('[All Tweets] IP: ' . $this->ipAddr . ' - UserAgent:' . $this->userAgent . ' - RequestMethod: ' . $this->requestMethod . ' - QueryString: ' . $this->queryString);
        Log::info('[All Tweets] Message: Accessed endpoint');

        try {
            $data = Tweet::all();
            $time_end = microtime(true);

            Log::info('[All Tweets] Message: Well succeed');
            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            Log::error('[All Tweets] Message: ' . $ex->getMessage());
            Log::error('[All Tweets] StackTrace: ' . $ex->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function getTweetByHashtag($hashtag = false)
    {
        $time_start = microtime(true);
        Log::debug('[Tweets By Hashtag] IP: ' . $this->ipAddr . ' - UserAgent:' . $this->userAgent . ' - RequestMethod: ' . $this->requestMethod . ' - QueryString: ' . $this->queryString);
        Log::info('[Tweets By Hashtag] Message: Accessed endpoint');

        if (!$hashtag || strlen($hashtag) < 2) {
            Log::debug('[Tweets By Hashtag] Message: Bad Request: invalid hashtag');
            return response()->json([
                'success' => false,
                'message' => 'Bad Request: invalid hashtag'
            ], 400);
        }

        try {
            $data = Tweet::getTweetsByHashtag($hashtag);
            $time_end = microtime(true);

            Log::info('[Tweets By Hashtag] Message: Well succeed');
            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            Log::error('[Tweets By Hashtag] Message: ' . $ex->getMessage());
            Log::error('[Tweets By Hashtag] StackTrace: ' . $ex->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function batchSaveTweets()
    {
        $time_start = microtime(true);
        Log::debug('[Find and Save Tweets] IP: ' . $this->ipAddr . ' - UserAgent:' . $this->userAgent . ' - RequestMethod: ' . $this->requestMethod . ' - QueryString: ' . $this->queryString);
        Log::info('[Find and Save Tweets] Message: Accessed endpoint');

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

            Log::info('[Find and Save Tweets] Message: Well succeed');
            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
            ]);
        } catch (\Exception $ex) {
            Log::error('[Find and Save Tweets] Message: ' . $ex->getMessage());
            Log::error('[Find and Save Tweets] StackTrace: ' . $ex->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function getTop5UsersByFollowers()
    {
        $time_start = microtime(true);
        Log::debug('[Top 5 Users By Followers] IP: ' . $this->ipAddr . ' - UserAgent:' . $this->userAgent . ' - RequestMethod: ' . $this->requestMethod . ' - QueryString: ' . $this->queryString);
        Log::info('[Top 5 Users By Followers] Message: Accessed endpoint');

        try {
            $data = Tweet::getTop5UsersByFollowers();
            $time_end = microtime(true);

            Log::info('[Top 5 Users By Followers] Message: Well succeed');
            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            Log::error('[Top 5 Users By Followers] Message: ' . $ex->getMessage());
            Log::error('[Top 5 Users By Followers] StackTrace: ' . $ex->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function getTotalPostsByHour()
    {
        $time_start = microtime(true);
        Log::debug('[Total Posts By Hour] IP: ' . $this->ipAddr . ' - UserAgent:' . $this->userAgent . ' - RequestMethod: ' . $this->requestMethod . ' - QueryString: ' . $this->queryString);
        Log::info('[Total Posts By Hour] Message: Accessed endpoint');

        try {
            $data = Tweet::getTotalPostsByHour();
            $time_end = microtime(true);

            Log::info('[Total Posts By Hour] Message: Well succeed');
            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            Log::error('[Total Posts By Hour] Message: ' . $ex->getMessage());
            Log::error('[Total Posts By Hour] StackTrace: ' . $ex->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function getTotalPostsByHashtagLangLocal()
    {
        $time_start = microtime(true);
        Log::debug('[Total Posts By Hastag/Lang/Local] IP: ' . $this->ipAddr . ' - UserAgent:' . $this->userAgent . ' - RequestMethod: ' . $this->requestMethod . ' - QueryString: ' . $this->queryString);
        Log::info('[Total Posts By Hastag/Lang/Local] Message: Accessed endpoint');

        try {
            $data = Tweet::getTotalPostsByHashtagLangLocal()->get()->toArray();
            $time_end = microtime(true);

            Log::info('[Total Posts By Hastag/Lang/Local] Message: Well succeed');
            return response()->json([
                'success' => true,
                'request_time_start' => $time_start,
                'request_time_end' => $time_end,
                'api_response_time' => number_format($time_end - $time_start, 2) . ' segundos',
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            Log::error('[Total Posts By Hastag/Lang/Local] Message: ' . $ex->getMessage());
            Log::error('[Total Posts By Hastag/Lang/Local] StackTrace: ' . $ex->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }
}
