<?php

namespace App\Http\Controllers;

use App\Domain\Game\Queries\GetGameByAliasQuery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class GameController
 * @package App\Http\Controllers
 */
class GameController extends Controller
{
    /**
     * @param string $alias
     * @return Application|Factory|View
     */
    public function show(string $alias)
    {
        $game = $this->dispatch(new GetGameByAliasQuery($alias));

        return view('game.index', [
            'game' => $game
        ]);
    }
}
