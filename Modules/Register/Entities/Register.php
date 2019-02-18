<?php

namespace Modules\Register\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use Translatable;

    protected $table = 'register__registers';
    public $translatedAttributes = [];
    protected $fillable = ['name','name_parent','phone','class_id','birth','status'];
}
