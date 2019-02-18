<?php

namespace Modules\Service\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Translatable;

    protected $table = 'service__services';
    public $translatedAttributes = [];
    protected $fillable = ['name','phone','date','time_start','time_end','center_id'];
}
