<?php

namespace Modules\Link\Repositories\Eloquent;

use Modules\Link\Events\LinkWasCreated;
use Modules\Link\Events\LinkWasUpdated;
use Modules\Link\Events\LinkWasDeleted;
use Modules\Link\Repositories\LinkRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentLinkRepository extends EloquentBaseRepository implements LinkRepository
{
    public function create($data)
    {
        $link = $this->model->create($data);

        event(new LinkWasCreated($link, $data));
        return $link;
    }

    /**
     * Update a resource
     * @param $dining
     * @param  array $data
     * @return mixed
     */
    public function update($link, $data)
    {
        $link->update($data);

        event(new LinkWasUpdated($link, $data));

        return $link;
    }

    public function destroy($model)
    {
        event(new LinkWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }

}
