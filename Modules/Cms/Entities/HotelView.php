<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class HotelView extends BaseModel
{
    protected $table = 'hotel_views';

    protected $fillable = [
        'remote_ip',
		'hotel_id'
    ];

    protected $hidden = [];

    protected $casts = [
        'remote_ip' => 'string',
		'hotel_id' => 'integer',
    ];
}
