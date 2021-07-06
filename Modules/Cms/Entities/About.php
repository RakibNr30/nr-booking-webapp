<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class About extends BaseModel
{
    protected $table = 'abouts';

    protected $fillable = [
        'quality_assured',
        'hotel_search',
        'we_care_you_happy',
    ];

    protected $hidden = [];

    protected $casts = [
        'quality_assured' => 'string',
        'hotel_search' => 'string',
        'we_care_you_happy' => 'string',
    ];
}
