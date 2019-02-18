<?php

namespace Modules\Club\Events;

use Modules\Club\Entities\Club;
use Modules\Media\Contracts\StoringMedia;

class ClubWasUpdated implements  StoringMedia {
    /**
     * @var array
     */
    public $data;
    /**
     * @var int
     */
    public $club;

    public function __construct( Club $club, array $data ) {
        $this->data   = $data;
        $this->club = $club;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity() {
        return $this->club;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData() {
        return $this->data;
    }

    public function setData( $data ) {
        $this->data = $data;
    }
}
