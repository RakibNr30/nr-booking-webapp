<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class Country extends BaseModel
{
    protected $table = 'countries';

    protected $fillable = [];

    protected $hidden = [];

    protected $appends = [];

    protected $casts = [];
}