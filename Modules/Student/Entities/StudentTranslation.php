<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'student__student_translations';
}
