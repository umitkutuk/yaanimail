<?php

namespace App\Http\Controllers;

use App\Events\Feed\FeedCreated;
use App\Events\Feed\FeedDeleted;
use App\Events\Feed\FeedUpdated;
use App\Http\Requests\Feed\FeedStoreRequest;
use App\Http\Requests\Feed\FeedUpdateRequest;
use App\Http\Resources\Feed\FeedCollection;
use App\Http\Resources\Feed\FeedResource;
use App\Queries\Feed\FeedsQuery;
use App\Services\Feed\FeedServiceInterface;
use App\Services\Integration\Feed\Adapters\Twitter;
use App\Services\Integration\Feed\FeedIntegration;
use App\Services\Integration\IntegrationManagerInterface;

class FeedController extends Controller
{
    /**
     * @var \App\Services\Feed\FeedServiceInterface
     */
    public $feedService;

    /**
     * FeedController constructor.
     * @param \App\Services\Feed\FeedServiceInterface $feedService
     */
    public function __construct(FeedServiceInterface $feedService)
    {
        $this->feedService = $feedService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Feed\FeedCollection
     */
    public function index(): FeedCollection
    {
        $feeds = (new FeedsQuery())->paginate();

        return new FeedCollection($feeds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Feed\FeedStoreRequest $request
     * @return \App\Http\Resources\Feed\FeedResource
     */
    public function store(FeedStoreRequest $request): FeedResource
    {
        $data = $request->validated();

        $feed = $this->feedService->createFeed($data);

        event(new FeedCreated($feed));

        return new FeedResource($feed);
    }

    /**
     * @param int $id
     * @return \App\Http\Resources\Feed\FeedResource
     */
    public function show($id): FeedResource
    {
        $feed = $this->feedService->getFeedById($id);

        return new FeedResource($feed);
    }

    /**
     * @param \App\Http\Requests\Feed\FeedUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\Feed\FeedResource
     */
    public function update(FeedUpdateRequest $request, $id): FeedResource
    {
        $feed = $this->feedService->updateFeed($request->validated(), $id);

        event(new FeedUpdated($feed));

        return new FeedResource($feed);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Http\Resources\Feed\FeedResource
     * @throws \Exception
     */
    public function destroy($id): FeedResource
    {
        $feed = $this->feedService->destroyFeed($id);

        event(new FeedDeleted($feed));

        return new FeedResource($feed);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function collectFeed(): \Illuminate\Http\JsonResponse
    {
        $integrationManager = resolve(IntegrationManagerInterface::class);

        $integration = $integrationManager->loadIntegration(new FeedIntegration(new Twitter()));

        $integration->collectFeed();

        return response()->json([
            'message' => __("success")
        ]);
    }
}
