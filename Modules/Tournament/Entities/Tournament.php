<?php

namespace Modules\Tournament\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use Translatable;

    protected $table = 'tournament__tournaments';
    public $translatedAttributes = [];
    protected $fillable = ['name','status','date'];
}
