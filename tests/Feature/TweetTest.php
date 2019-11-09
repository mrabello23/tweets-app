<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TweetTest extends TestCase
{
    use RefreshDatabase;

    public function testRenderPages()
    {
        $response = $this->get(route('web.index'));
        $response->assertStatus(200);

        $response1 = $this->get(route('web.total.hour'));
        $response1->assertStatus(200);

        $response2 = $this->get(route('web.total.tag.lang.local'));
        $response2->assertStatus(200);

        $response3 = $this->get(route('web.top.users'));
        $response3->assertStatus(200);
    }

    public function testGetTweetByHashtagWithoutTag()
    {
        $response = $this->get('/api/v1/tweets/hashtag');
        $response->assertStatus(400);
    }

    public function testGetTweetByHashtag()
    {
        $response = $this->get('/api/v1/tweets/hashtag/devops');
        $response->assertStatus(200);
    }

    public function testBatchSaveTweets()
    {
        $response = $this->get('/api/v1/tweets/batch-save');
        $response->assertStatus(200);
    }
}
