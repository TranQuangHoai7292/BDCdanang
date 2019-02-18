<?php

namespace Modules\Club\Entities;

use Illuminate\Database\Eloquent\Model;

class ClubTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'club__club_translations';
}
