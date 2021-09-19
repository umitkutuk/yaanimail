<?php

namespace App\Services\Feed;

use App\Models\Feed;
use App\Repositories\Feed\FeedRepositoryInterface;

class FeedService implements FeedServiceInterface
{
    /**
     * @var \App\Repositories\Feed\FeedRepositoryInterface
     */
    public $feedRepository;

    /**
     * @param \App\Repositories\Feed\FeedRepositoryInterface $feedRepository
     */
    public function __construct(FeedRepositoryInterface $feedRepository)
    {
        $this->feedRepository = $feedRepository;
    }

    /**
     * @inheritDoc
     */
    public function createFeed(array $data): Feed
    {
        $feed = $this->feedRepository->create($data);

        return $feed;
    }

    /**
     * @inheritDoc
     */
    public function getFeedById(int $id): Feed
    {
        return $this->feedRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateFeed(array $data, int $id): Feed
    {
        $feed = $this->feedRepository->update($data, $id);

        return $feed;
    }

    /**
     * @inheritDoc
     */
    public function destroyFeed(int $id): Feed
    {
        $feed = $this->feedRepository->destroy($id);

        return $feed;
    }
}
