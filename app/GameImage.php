<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Eloquent;

/**
 * App\CatalogProductImage
 *
 * @property int $id
 * @property int $game_id
 * @property string|null $name
 * @property string|null $alt
 * @property string|null $title
 * @property string $basename
 * @property string $ext
 * @property string $is_published
 * @property int $pos
 * @property-read Game $project
 * @mixin Eloquent
 */
class GameImage extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['game_id', 'name', 'alt', 'title', 'basename', 'ext', 'is_published', 'pos'];

    /**
     * @return BelongsTo
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return asset('storage/games/' . $this->game_id . '/' . $this->basename . '.' . $this->ext);
    }

    /**
     * @return string
     */
    public function getThumb(): string
    {
        return asset('storage/games/' . $this->game_id . '/' . $this->basename . '_thumb.' . $this->ext);
    }
}
