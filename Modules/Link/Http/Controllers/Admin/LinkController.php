<?php

namespace Modules\Link\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Link\Entities\Link;
use Modules\Link\Http\Requests\CreateLinkRequest;
use Modules\Link\Http\Requests\UpdateLinkRequest;
use Modules\Link\Repositories\LinkRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class LinkController extends AdminBaseController
{
    /**
     * @var LinkRepository
     */
    private $link;

    public function __construct(LinkRepository $link)
    {
        parent::__construct();

        $this->link = $link;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $links = $this->link->all();

        return view('link::admin.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $link = new Link();
        return view('link::admin.links.create',compact('link'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLinkRequest $request
     * @return Response
     */
    public function store(CreateLinkRequest $request)
    {
        $this->link->create($request->all());

        return redirect()->route('admin.link.link.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('link::links.title.links')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Link $link
     * @return Response
     */
    public function edit(Link $link)
    {
        return view('link::admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Link $link
     * @param  UpdateLinkRequest $request
     * @return Response
     */
    public function update(Link $link, UpdateLinkRequest $request)
    {
        $this->link->update($link, $request->all());

        return redirect()->route('admin.link.link.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('link::links.title.links')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Link $link
     * @return Response
     */
    public function destroy(Link $link)
    {
        $this->link->destroy($link);

        return redirect()->route('admin.link.link.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('link::links.title.links')]));
    }
}
