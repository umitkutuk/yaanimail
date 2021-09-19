<?php

namespace App\Queries\Feed;

use App\Repositories\Feed\FeedRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FeedsQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        // Resolve services, repositories etc. here...
        // $userService = resolve(UserServiceInterface::class);
        $feedRepository = resolve(FeedRepositoryInterface::class);

        $builder = $feedRepository->getBuilder()
            ->where(function (Builder $builder){
                $builder->where('is_published', true)
                    ->orWhere('user_id', auth()->user()->id);
            });

        parent::__construct($builder, $request);

        // Put your filters, sorts etc. here:
        // $this->allowedFilters(...
        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
