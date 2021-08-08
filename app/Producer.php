<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use AutoAliasTrait;

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'name_little',
        'title',
        'description',
        'text',
        'about',
        'preview',
        'alias',
        'pos'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tabs()
    {
        return $this->belongsToMany(
            Tab::class,
            'producer_tabs',
            'producer_id',
            'tab_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('App\Game');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    /**
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route("producer.show", $this->alias);
    }
}
