<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'tweet',
        'tweet_data',
        'hashtag',
        'seguidores',
        'localidade',
        'lingua',
        'usuario_nome',
        'usuario_apelido'
    ];

    public static function getTweetsByHashtag($hashtag)
    {
        $hashtag = strpos('#', $hashtag) ? str_replace('#', '%23', $hashtag) : '%23' . $hashtag;
        $url = 'https://api.twitter.com/1.1/search/tweets.json?count=100&q=' . $hashtag;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . env('TWITTER_BEARER_TOKEN')]);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            return json_decode($response, true);
        }

        return [];
    }

    public function formatDataToSave(array $data)
    {
        $hashtag = str_replace('%23', '#', $data['search_metadata']['query']);

        return array_map(function ($tweets) use ($hashtag) {
            return [
                'tweet_data' => date('Y-m-d H:i:s', strtotime($tweets['created_at'])),
                'tweet' => $tweets['text'],
                'lingua' => $tweets['lang'],
                'usuario_nome' => $tweets['user']['name'],
                'usuario_apelido' => $tweets['user']['screen_name'],
                'localidade' => $tweets['user']['location'],
                'seguidores' => $tweets['user']['followers_count'],
                'hashtag' => $hashtag
            ];
        }, $data['statuses']);
    }

    public function batchSaveTweetsByHashtag(array $hashtags)
    {
        foreach ($hashtags as $hashtag) {
            $tweets = Tweet::getTweetsByHashtag($hashtag);
            $dataToSave = $this->formatDataToSave($tweets);

            array_walk($dataToSave, function ($tweet) {
                Tweet::updateOrCreate(
                    [
                        'tweet_data' => $tweet['tweet_data'],
                        'usuario_apelido' => $tweet['usuario_apelido'],
                        'hashtag' => $tweet['hashtag']
                    ],
                    $tweet
                );
            });
        }
    }
}
