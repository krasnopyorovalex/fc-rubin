<?php

namespace App\Http\ViewComposers;

use App\Game;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class GamesComposer
 * @package App\Http\ViewComposers
 */
class GamesComposer
{
    use DispatchesJobs;

    private static $games;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$games) {
            self::$games = Game::limit(5)->get();
        }

        $view->with('games', self::$games);
    }
}
