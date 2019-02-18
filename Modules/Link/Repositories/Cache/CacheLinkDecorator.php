<?php

namespace Modules\Link\Repositories\Cache;

use Modules\Link\Repositories\LinkRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLinkDecorator extends BaseCacheDecorator implements LinkRepository
{
    public function __construct(LinkRepository $link)
    {
        parent::__construct();
        $this->entityName = 'link.links';
        $this->repository = $link;
    }
}
