<?php

namespace Modules\Tournament\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Tournament\Entities\Tournament;
use Modules\Tournament\Entities\News;
use Modules\Tournament\Http\Requests\CreateNewsRequest;
use Modules\Tournament\Http\Requests\UpdateNewsRequest;
use Modules\Tournament\Repositories\NewsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class NewsController extends AdminBaseController
{
    /**
     * @var NewsRepository
     */
    private $news;

    public function __construct(NewsRepository $news)
    {
        parent::__construct();

        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tournaments = Tournament::all();
        $news = $this->news->all();

        return view('tournament::admin.news.index', compact('news','tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tournament = Tournament::all();
        return view('tournament::admin.news.create',compact('tournament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNewsRequest $request
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        $this->news->create($request->all());

        return redirect()->route('admin.tournament.news.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('tournament::news.title.news')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return Response
     */
    public function edit(News $news)
    {
        $tournaments = Tournament::all();
        return view('tournament::admin.news.edit', compact('news','tournaments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  News $news
     * @param  UpdateNewsRequest $request
     * @return Response
     */
    public function update(News $news, UpdateNewsRequest $request)
    {
        $this->news->update($news, $request->all());

        return redirect()->route('admin.tournament.news.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('tournament::news.title.news')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return Response
     */
    public function destroy(News $news)
    {
        $this->news->destroy($news);

        return redirect()->route('admin.tournament.news.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('tournament::news.title.news')]));
    }
}
