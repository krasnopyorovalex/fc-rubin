<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Team extends Model
{
    use AutoAliasTrait;

    protected $guarded = ['image'];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
