<?php

namespace Modules\Center\Repositories\Cache;

use Modules\Center\Repositories\CenterRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCenterDecorator extends BaseCacheDecorator implements CenterRepository
{
    public function __construct(CenterRepository $center)
    {
        parent::__construct();
        $this->entityName = 'center.centers';
        $this->repository = $center;
    }
}
