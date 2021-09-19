<?php

namespace App\Services\Feed;

use App\Models\Feed;

interface FeedServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Feed
     */
    public function createFeed(array $data): Feed;

    /**
     * @param int $id
     * @return \App\Models\Feed
     */
    public function getFeedById(int $id): Feed;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Models\Feed
     */
    public function updateFeed(array $data, int $id): Feed;

    /**
     * @param int $id
     * @return \App\Models\Feed
     * @throws \Exception
     */
    public function destroyFeed(int $id): Feed;
}
