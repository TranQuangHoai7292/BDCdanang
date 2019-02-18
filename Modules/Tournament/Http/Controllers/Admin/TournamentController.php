<?php

namespace Modules\Tournament\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Tournament\Entities\Tournament;
use Modules\Tournament\Http\Requests\CreateTournamentRequest;
use Modules\Tournament\Http\Requests\UpdateTournamentRequest;
use Modules\Tournament\Repositories\TournamentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Tournament\Entities\News;

class TournamentController extends AdminBaseController
{
    /**
     * @var TournamentRepository
     */
    private $tournament;

    public function __construct(TournamentRepository $tournament)
    {
        parent::__construct();

        $this->tournament = $tournament;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tournaments = $this->tournament->all();

        return view('tournament::admin.tournaments.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tournament::admin.tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTournamentRequest $request
     * @return Response
     */
    public function store(CreateTournamentRequest $request)
    {
        $this->tournament->create($request->all());

        return redirect()->route('admin.tournament.tournament.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('tournament::tournaments.title.tournaments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tournament $tournament
     * @return Response
     */
    public function edit(Tournament $tournament)
    {
        return view('tournament::admin.tournaments.edit', compact('tournament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Tournament $tournament
     * @param  UpdateTournamentRequest $request
     * @return Response
     */
    public function update(Tournament $tournament, UpdateTournamentRequest $request)
    {
        $this->tournament->update($tournament, $request->all());

        return redirect()->route('admin.tournament.tournament.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('tournament::tournaments.title.tournaments')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tournament $tournament
     * @return Response
     */
    public function destroy(Tournament $tournament)
    {
        $this->tournament->destroy($tournament);

        return redirect()->route('admin.tournament.tournament.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('tournament::tournaments.title.tournaments')]));
    }
}
