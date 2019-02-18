<?php

namespace Modules\Club\Events;

use Modules\Media\Contracts\DeletingMedia;

class ClubWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $club;
    /**
     * @var int
     */
    private $clubId;

    public function __construct($clubId, $club)
    {
        $this->club = $club;
        $this->clubId = $clubId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->clubId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->club;
    }
}
