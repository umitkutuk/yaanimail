<?php

namespace App\Repositories\Feed;

use App\Models\Feed;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface FeedRepositoryInterface
{
    /**
     * @return \App\Models\Feed
     */
    public function getModel(): Feed;

    /**
     * @return \App\Models\Feed|\Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder();

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return $this
     */
    public function setBuilder(Builder $builder);

    /**
     * Get all of the models from the database.
     *
     * @param string[] $columns
     * @return \App\Models\Feed[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\Models\Feed
     */
    public function findOrFail(int $id): Feed;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\Feed
     */
    public function create(array $attributes): Feed;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\Models\Feed
     */
    public function update(array $attributes, int $id, array $options = []): Feed;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Models\Feed
     * @throws \Exception
     */
    public function destroy(int $id): Feed;
}
