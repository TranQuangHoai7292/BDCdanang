<?php

namespace Modules\Link\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Link extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'link__links';
    public $translatedAttributes = [];
    protected $fillable = ['name','status','link'];
}
