<?php

namespace Modules\Classstudy\Entities;

use Illuminate\Database\Eloquent\Model;

class ClassstudyTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'classstudy__classstudy_translations';
}
