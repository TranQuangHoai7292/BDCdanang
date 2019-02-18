<?php

namespace Modules\Club\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Club\Entities\Club;
use Modules\Club\Http\Requests\CreateClubRequest;
use Modules\Club\Http\Requests\UpdateClubRequest;
use Modules\Club\Repositories\ClubRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ClubController extends AdminBaseController
{
    /**
     * @var ClubRepository
     */
    private $club;

    public function __construct(ClubRepository $club)
    {
        parent::__construct();

        $this->club = $club;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clubs = $this->club->all();

        return view('club::admin.clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $club = new Club();
        return view('club::admin.clubs.create',compact('club'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateClubRequest $request
     * @return Response
     */
    public function store(CreateClubRequest $request)
    {
        $this->club->create($request->all());

        return redirect()->route('admin.club.club.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('club::clubs.title.clubs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Club $club
     * @return Response
     */
    public function edit(Club $club)
    {
        return view('club::admin.clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Club $club
     * @param  UpdateClubRequest $request
     * @return Response
     */
    public function update(Club $club, UpdateClubRequest $request)
    {
        $this->club->update($club, $request->all());

        return redirect()->route('admin.club.club.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('club::clubs.title.clubs')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Club $club
     * @return Response
     */
    public function destroy(Club $club)
    {
        $this->club->destroy($club);

        return redirect()->route('admin.club.club.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('club::clubs.title.clubs')]));
    }
}
