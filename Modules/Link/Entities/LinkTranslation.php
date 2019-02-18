<?php

namespace Modules\Link\Entities;

use Illuminate\Database\Eloquent\Model;

class LinkTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'link__link_translations';
}
