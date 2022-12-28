<?php

namespace App\Models;

use App\Concerns\HasUserId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, HasSlug, HasUuids, HasUserId, SoftDeletes;

    protected $guarded = ['id'];


    protected $casts = [
        'published_at' => 'datetime',
        'meta' => 'array',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    public function topics(): BelongsToMany
    {
        // TODO: This should be a belongsTo() relationship?

        return $this->belongsToMany(
            Topic::class,
            'posts_topics',
            'post_id',
            'topic_id'
        );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'posts_tags',
            'post_id',
            'tag_id'
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function getReadTimeAttribute(): string
    // {
    //     $words = str_word_count(strip_tags($this->body));

    //     $minutes = ceil($words / 250);

    //     return vsprintf(
    //         '%d %s %s',
    //         [
    //             $minutes,
    //             Str::plural(trans('canvas::app.min', [], optional(request()->user())->locale), $minutes),
    //             trans('canvas::app.read', [], optional(request()->user())->locale),
    //         ]
    //     );
    // }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published_at', '<=', now())->where('status', 'publish');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('published_at', '=', null)->orWhere('published_at', '>', now()->toDateTimeString());
    }

    public function getNextAttribute()
    {
        return static::where('id', '>', $this->id)->published()->orderBy('id', 'asc')->first();
    }


    public  function getPreviousAttribute()
    {
        return static::where('id', '<', $this->id)->published()->orderBy('id', 'desc')->first();
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function (self $post) {
            $post->tags()->detach();
            $post->topics()->detach();
        });
    }
}