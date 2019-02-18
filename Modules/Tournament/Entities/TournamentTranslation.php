<?php

namespace Modules\Tournament\Entities;

use Illuminate\Database\Eloquent\Model;

class TournamentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'tournament__tournament_translations';
}
