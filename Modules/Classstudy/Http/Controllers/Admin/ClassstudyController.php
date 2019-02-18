<?php

namespace Modules\Classstudy\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Classstudy\Entities\Classstudy;
use Modules\Classstudy\Http\Requests\CreateClassstudyRequest;
use Modules\Classstudy\Http\Requests\UpdateClassstudyRequest;
use Modules\Classstudy\Repositories\ClassstudyRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ClassstudyController extends AdminBaseController
{
    /**
     * @var ClassstudyRepository
     */
    private $classstudy;

    public function __construct(ClassstudyRepository $classstudy)
    {
        parent::__construct();

        $this->classstudy = $classstudy;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $classstudies = $this->classstudy->all();

        return view('classstudy::admin.classstudies.index', compact('classstudies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('classstudy::admin.classstudies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateClassstudyRequest $request
     * @return Response
     */
    public function store(CreateClassstudyRequest $request)
    {
        $this->classstudy->create($request->all());

        return redirect()->route('admin.classstudy.classstudy.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('classstudy::classstudies.title.classstudies')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Classstudy $classstudy
     * @return Response
     */
    public function edit(Classstudy $classstudy)
    {
        return view('classstudy::admin.classstudies.edit', compact('classstudy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Classstudy $classstudy
     * @param  UpdateClassstudyRequest $request
     * @return Response
     */
    public function update(Classstudy $classstudy, UpdateClassstudyRequest $request)
    {
        $this->classstudy->update($classstudy, $request->all());

        return redirect()->route('admin.classstudy.classstudy.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('classstudy::classstudies.title.classstudies')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Classstudy $classstudy
     * @return Response
     */
    public function destroy(Classstudy $classstudy)
    {
        $this->classstudy->destroy($classstudy);

        return redirect()->route('admin.classstudy.classstudy.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('classstudy::classstudies.title.classstudies')]));
    }
}
