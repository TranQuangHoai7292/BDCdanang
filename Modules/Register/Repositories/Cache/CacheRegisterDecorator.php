<?php

namespace Modules\Register\Repositories\Cache;

use Modules\Register\Repositories\RegisterRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheRegisterDecorator extends BaseCacheDecorator implements RegisterRepository
{
    public function __construct(RegisterRepository $register)
    {
        parent::__construct();
        $this->entityName = 'register.registers';
        $this->repository = $register;
    }
}
