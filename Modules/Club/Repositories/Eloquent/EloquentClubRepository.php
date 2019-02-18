<?php

namespace Modules\Club\Repositories\Eloquent;

use Modules\Club\Events\ClubWasCreated;
use Modules\Club\Events\ClubWasDeleted;
use Modules\Club\Events\ClubWasUpdated;
use Modules\Club\Repositories\ClubRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentClubRepository extends EloquentBaseRepository implements ClubRepository
{
    public function create($data)
    {
        $club = $this->model->create($data);

        event(new ClubWasCreated($club, $data));
        return $club;
    }

    /**
     * Update a resource
     * @param $dining
     * @param  array $data
     * @return mixed
     */
    public function update($club, $data)
    {
        $club->update($data);

        event(new ClubWasUpdated($club, $data));

        return $club;
    }

    public function destroy($model)
    {
        event(new ClubWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }

}
