<?php

namespace Modules\Register\Entities;

use Illuminate\Database\Eloquent\Model;

class RegisterTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'register__register_translations';
}
