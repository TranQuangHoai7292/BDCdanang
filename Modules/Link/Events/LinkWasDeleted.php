<?php

namespace Modules\Link\Events;

use Modules\Media\Contracts\DeletingMedia;

class LinkWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $link;
    /**
     * @var int
     */
    private $linkId;

    public function __construct($linkId, $link)
    {
        $this->link = $link;
        $this->linkId = $linkId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->linkId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->link;
    }
}
