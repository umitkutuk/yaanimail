<?php

namespace App\Services\Integration\Feed\Adapters;

use App\Models\Feed;
use App\Services\Integration\IntegrationAdapter;
use App\Services\Integration\Feed\FeedIntegrationAdapterInterface;
use Illuminate\Support\Facades\Http;

class Twitter extends IntegrationAdapter implements FeedIntegrationAdapterInterface
{
    public function getFeed()
    {
        $feed_twitter = config('feeds.feed_twitter' );
        $info = config('feeds.' . $feed_twitter);

        $url = $info['adapter_baseurl'] . "users/". auth()->user()->twitter_user_id ."/tweets";

        return Http::withToken($info['adapter_token'])
            ->get($url, [
                'max_results' => 20
            ])
            ->json();
    }

    public function collectFeed()
    {
        $feed_twitter = config('feeds.feed_twitter' );

        $feeds = $this->getFeed();

        foreach ($feeds['data'] as $feed)
        {
            Feed::create([
                'adapter_id' => $feed_twitter,
                'user_id' => auth()->user()->id,
                'feed_id' => $feed['id'],
                'feed' => $feed['text'],
            ]);
        }
    }
}
