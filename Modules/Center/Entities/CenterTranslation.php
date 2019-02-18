<?php

namespace Modules\Center\Entities;

use Illuminate\Database\Eloquent\Model;

class CenterTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'center__center_translations';
}
