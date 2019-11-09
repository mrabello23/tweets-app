<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Tweet;

class TweetTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testCallTwitterApi()
    {
        $tweets = Tweet::getTweetsByHashtag('devops');

        $this->assertNotNull($tweets);
        $this->assertGreaterThanOrEqual(1, count($tweets));
    }

    public function testCallTwitterApiInvalidParam()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid hashtag.');

        Tweet::getTweetsByHashtag();
    }

    public function testFormatDataFromApiInvalidParam()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Empty array.');

        $tweet = new Tweet;
        $tweet->formatDataToSave([]);
    }

    public function testFormatDataFromApi()
    {
        $tweet = new Tweet;
        $response = $tweet->formatDataToSave(json_decode('{
            "statuses": [{
                "created_at": "Sat Nov 09 17:38:26 +0000 2019",
                "id": 1193221320248635393,
                "id_str": "1193221320248635393",
                "text": "RT @eworker_co: Engineering Manager, DevOps, David Ogbiko, of @OPay_NG speaking at this year\'s @devopsng Conference. \n\nDavid is clarifying…",
                "truncated": false,
                "user": {
                    "id": 285346029,
                    "id_str": "285346029",
                    "name": "Thoughtful",
                    "screen_name": "OganBelema",
                    "location": "Lekki ",
                    "protected": false,
                    "followers_count": 3311,
                    "friends_count": 2946,
                    "listed_count": 72,
                    "created_at": "Thu Apr 21 00:22:21 +0000 2011",
                    "favourites_count": 79630,
                    "geo_enabled": true,
                    "verified": false,
                    "statuses_count": 189839
                },
                "lang": "en"
            }],
            "search_metadata": {
                "completed_in": 0.051,
                "max_id": 1193221320248635393,
                "max_id_str": "1193221320248635393",
                "next_results": "?max_id=1193219255430455297&q=%23devops&include_entities=1",
                "query": "%23devops",
                "refresh_url": "?since_id=1193221320248635393&q=%23devops&include_entities=1",
                "count": 15,
                "since_id": 0,
                "since_id_str": "0"
            }
        }', true));

        $this->assertGreaterThanOrEqual(1, count($response));
    }
}
