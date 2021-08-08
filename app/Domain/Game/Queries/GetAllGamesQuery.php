<?php

namespace App\Domain\Game\Queries;

use App\Game;

/**
 * Class GetAllGamesQuery
 * @package App\Domain\Game\Queries
 */
class GetAllGamesQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Game::with(['image', 'teamFirst', 'teamSecond'])->latest('started_at')->get();
    }
}
