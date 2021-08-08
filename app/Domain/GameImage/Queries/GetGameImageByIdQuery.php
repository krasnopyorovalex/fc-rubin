<?php

namespace App\Domain\GameImage\Queries;

use App\GameImage;

/**
 * Class GetGameImageByIdQuery
 * @package App\Domain\GameImage\Queries
 */
class GetGameImageByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetGameImageByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return GameImage::findOrFail($this->id);
    }
}
