<?php

namespace Modules\Tournament\Repositories\Cache;

use Modules\Tournament\Repositories\NewsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheNewsDecorator extends BaseCacheDecorator implements NewsRepository
{
    public function __construct(NewsRepository $news)
    {
        parent::__construct();
        $this->entityName = 'tournament.news';
        $this->repository = $news;
    }
}
