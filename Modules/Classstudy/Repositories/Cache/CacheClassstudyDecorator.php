<?php

namespace Modules\Classstudy\Repositories\Cache;

use Modules\Classstudy\Repositories\ClassstudyRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheClassstudyDecorator extends BaseCacheDecorator implements ClassstudyRepository
{
    public function __construct(ClassstudyRepository $classstudy)
    {
        parent::__construct();
        $this->entityName = 'classstudy.classstudies';
        $this->repository = $classstudy;
    }
}
