<?php

namespace Modules\Club\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Club extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'club__clubs';
    public $translatedAttributes = [];
    protected $fillable = ['name','date','desciption','phone','number_member','address','name_court','founder'];
    protected $with = ['files'];
}
