<?php

namespace App\Services\Integration\Feed;

use App\Services\Integration\Integration;

class FeedIntegration extends Integration implements FeedIntegrationInterface
{
    public function getFeed()
    {
        return $this->getAdapter()->getFeed();
    }

    public function collectFeed()
    {
        return $this->getAdapter()->collectFeed();
    }
}
