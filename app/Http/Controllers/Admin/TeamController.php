<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Gallery\Queries\GetAllGalleriesQuery;
use App\Domain\Team\Commands\CreateTeamCommand;
use App\Domain\Team\Commands\DeleteTeamCommand;
use App\Domain\Team\Commands\UpdateTeamCommand;
use App\Domain\Team\Queries\GetAllTeamsQuery;
use App\Domain\Team\Queries\GetTeamByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Team\Requests\CreateTeamRequest;
use Domain\Team\Requests\UpdateTeamRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $teams = $this->dispatch(new GetAllTeamsQuery);

        return view('admin.teams.index', [
            'teams' => $teams
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $galleries = $this->dispatch(new GetAllGalleriesQuery());

        return view('admin.teams.create', [
            'galleries' => $galleries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTeamRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateTeamRequest $request)
    {
        $this->dispatch(new CreateTeamCommand($request));

        return redirect(route('admin.teams.index'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $team = $this->dispatch(new GetTeamByIdQuery($id));
        $galleries = $this->dispatch(new GetAllGalleriesQuery());

        return view('admin.teams.edit', [
            'team' => $team,
            'galleries' => $galleries
        ]);
    }

    /**
     * @param $id
     * @param UpdateTeamRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update($id, UpdateTeamRequest $request)
    {
        $this->dispatch(new UpdateTeamCommand($id, $request));

        return redirect(route('admin.teams.index'));
    }

    /**
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteTeamCommand($id));

        return redirect(route('admin.teams.index'));
    }
}
