<?php

namespace Modules\Classstudy\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Classstudy extends Model
{
    use Translatable;

    protected $table = 'classstudy__classstudies';
    public $translatedAttributes = [];
    protected $fillable = ['name','teacher','lession','start_time','end_time','description'];
}
