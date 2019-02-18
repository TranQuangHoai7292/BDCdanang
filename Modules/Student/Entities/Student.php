<?php

namespace Modules\Student\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use Translatable;

    protected $table = 'student__students';
    public $translatedAttributes = [];
    protected $fillable = ['name','birth','phone','class_id'];
}
