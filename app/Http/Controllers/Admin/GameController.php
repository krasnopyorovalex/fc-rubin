<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Game\Commands\CreateGameCommand;
use App\Domain\Game\Commands\DeleteGameCommand;
use App\Domain\Game\Commands\UpdateGameCommand;
use App\Domain\Game\Queries\GetAllGamesQuery;
use App\Domain\Game\Queries\GetGameByIdQuery;
use App\Domain\Team\Queries\GetAllTeamsQuery;
use App\Http\Controllers\Controller;
use Domain\Game\Requests\CreateGameRequest;
use Domain\Game\Requests\UpdateGameRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

/**
 * Class GameController
 * @package App\Http\Controllers\Admin
 */
class GameController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $games = $this->dispatch(new GetAllGamesQuery);

        return view('admin.games.index', [
            'games' => $games
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $teams = $this->dispatch(new GetAllTeamsQuery());

        return view('admin.games.create', ['teams' => $teams]);
    }

    /**
     * @param CreateGameRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateGameRequest $request)
    {
        $this->dispatch(new CreateGameCommand($request));

        return redirect(route('admin.games.index'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $game = $this->dispatch(new GetGameByIdQuery($id));
        $teams = $this->dispatch(new GetAllTeamsQuery());

        return view('admin.games.edit', [
            'game' => $game,
            'teams' => $teams
        ]);
    }

    /**
     * @param $id
     * @param UpdateGameRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateGameRequest $request)
    {
        $this->dispatch(new UpdateGameCommand($id, $request));

        return redirect(route('admin.games.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteGameCommand($id));

        return redirect(route('admin.games.index'));
    }
}
