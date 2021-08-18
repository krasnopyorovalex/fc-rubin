<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Game
 * @package App
 *
 * @property int $id
 * @property string $started_time_at
 * @property string $started_at
 */
class Game extends Model
{
    use AutoAliasTrait;

    /**
     * @var array
     */
    protected $guarded = ['image'];

    protected $dates = [
        'started_at',
    ];

    /**
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(GameImage::class)->orderBy('pos');
    }

    public function teamFirst(): HasOne
    {
        return $this->hasOne(Team::class, 'id', 'team_first_id');
    }

    public function teamSecond(): HasOne
    {
        return $this->hasOne(Team::class, 'id', 'team_second_id');
    }

    public function getStartedTime()
    {
        return $this->started_time_at
            ? date('H:i', strtotime($this->started_time_at))
            : 'TBC';
    }

    /**
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('game.show', $this->alias);
    }

    /**
     * @return string
     */
    public function getUrlGalleryAttribute(): string
    {
        return route('gallery.show', $this->alias);
    }
}
