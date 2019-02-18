<?php

namespace Modules\Link\Events;

use Modules\Link\Entities\Link;
use Modules\Media\Contracts\StoringMedia;

class LinkWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Product
     */
    public $link;

    public function __construct(Link $link, array $data)
    {
        $this->data = $data;
        $this->link = $link;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->link;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
