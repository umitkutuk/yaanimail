<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin \Eloquent
 */
class Feed extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'adapter_id',
        'user_id',
        'feed_id',
        'feed',
        'is_published',
        'published_at'
    ];

    protected $dates = [
        'published_at'
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Feed
     *
     * @var array
     */
    public static $labels = [
        'adapter_id' => 'Adaptör',
        'user_id' => 'Kullanıcı',
        'feed_id' => 'Feed ID',
        'feed' => 'Feed',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
