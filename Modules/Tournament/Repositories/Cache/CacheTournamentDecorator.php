<?php

namespace Modules\Tournament\Repositories\Cache;

use Modules\Tournament\Repositories\TournamentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTournamentDecorator extends BaseCacheDecorator implements TournamentRepository
{
    public function __construct(TournamentRepository $tournament)
    {
        parent::__construct();
        $this->entityName = 'tournament.tournaments';
        $this->repository = $tournament;
    }
}
