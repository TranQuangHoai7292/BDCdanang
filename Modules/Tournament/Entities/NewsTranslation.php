<?php

namespace Modules\Tournament\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'tournament__news_translations';
}
