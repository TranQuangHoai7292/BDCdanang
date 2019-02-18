<?php

namespace Modules\Tournament\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use Translatable;

    protected $table = 'tournament__news';
    public $translatedAttributes = [];
    protected $fillable = ['name','description','status','tournament_id'];
}
