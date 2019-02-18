<?php

namespace Modules\Service\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Service\Entities\Service;
use Modules\Center\Entities\Center;
use Modules\Service\Http\Requests\CreateServiceRequest;
use Modules\Service\Http\Requests\UpdateServiceRequest;
use Modules\Service\Repositories\ServiceRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ServiceController extends AdminBaseController
{
    /**
     * @var ServiceRepository
     */
    private $service;

    public function __construct(ServiceRepository $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $services = $this->service->all();
        $centers = Center::all();
        return view('service::admin.services.index', compact('services','centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $centers = Center::all();
        return view('service::admin.services.create',compact('centers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateServiceRequest $request
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $this->service->create($request->all());

        return redirect()->route('admin.service.service.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('service::services.title.services')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Service $service
     * @return Response
     */
    public function edit(Service $service)
    {
        $centers = Center::all();
        return view('service::admin.services.edit', compact('service','centers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Service $service
     * @param  UpdateServiceRequest $request
     * @return Response
     */
    public function update(Service $service, UpdateServiceRequest $request)
    {
        $this->service->update($service, $request->all());

        return redirect()->route('admin.service.service.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('service::services.title.services')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Service $service
     * @return Response
     */
    public function destroy(Service $service)
    {
        $this->service->destroy($service);

        return redirect()->route('admin.service.service.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('service::services.title.services')]));
    }
}
