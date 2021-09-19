<?php

return [
    "feed_twitter" => env('FEED_TWITTER_NAME'),

    'integrations' => [
        [
            'name' => env('FEED_TWITTER_NAME'),
            'adapter_baseurl' => env('FEED_TWITTER_ADAPTER_BASE_URL'),
            'adapter_token' => env('FEED_TWITTER_ADAPTER_TOKEN'),
        ]
    ],

    env('FEED_TWITTER_NAME') => [
        'adapter_baseurl' => env('FEED_TWITTER_ADAPTER_BASE_URL'),
        'adapter_token' => env('FEED_TWITTER_ADAPTER_TOKEN'),
    ],
];
