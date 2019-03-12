<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
