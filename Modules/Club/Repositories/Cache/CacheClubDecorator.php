<?php

namespace Modules\Club\Repositories\Cache;

use Modules\Club\Repositories\ClubRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheClubDecorator extends BaseCacheDecorator implements ClubRepository
{
    public function __construct(ClubRepository $club)
    {
        parent::__construct();
        $this->entityName = 'club.clubs';
        $this->repository = $club;
    }
}
