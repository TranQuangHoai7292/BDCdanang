<?php

namespace Modules\Center\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use Translatable;

    protected $table = 'center__centers';
    public $translatedAttributes = [];
    protected $fillable = ['name','address','date','description','phone','name_manager','status'];
}
