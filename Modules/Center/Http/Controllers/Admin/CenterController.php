<?php

namespace Modules\Center\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Center\Entities\Center;
use Modules\Center\Http\Requests\CreateCenterRequest;
use Modules\Center\Http\Requests\UpdateCenterRequest;
use Modules\Center\Repositories\CenterRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CenterController extends AdminBaseController
{
    /**
     * @var CenterRepository
     */
    private $center;

    public function __construct(CenterRepository $center)
    {
        parent::__construct();

        $this->center = $center;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centers = $this->center->all();

        return view('center::admin.centers.index', compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('center::admin.centers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCenterRequest $request
     * @return Response
     */
    public function store(CreateCenterRequest $request)
    {
        $this->center->create($request->all());

        return redirect()->route('admin.center.center.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('center::centers.title.centers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Center $center
     * @return Response
     */
    public function edit(Center $center)
    {
        return view('center::admin.centers.edit', compact('center'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Center $center
     * @param  UpdateCenterRequest $request
     * @return Response
     */
    public function update(Center $center, UpdateCenterRequest $request)
    {
        $this->center->update($center, $request->all());

        return redirect()->route('admin.center.center.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('center::centers.title.centers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Center $center
     * @return Response
     */
    public function destroy(Center $center)
    {
        $this->center->destroy($center);

        return redirect()->route('admin.center.center.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('center::centers.title.centers')]));
    }
}
