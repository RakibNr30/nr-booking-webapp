<?php

namespace Modules\Ums\Entities;

use App\Models\BaseModel;

class UserResidentialInfo extends BaseModel
{
    protected $table = 'user_residential_infos';

    protected $fillable = [
        'country',
		'city',
		'state',
		'address_line_1',
		'address_line_2',
		'user_id',
    ];

    protected $hidden = [];

    protected $casts = [
        'country' => 'string',
		'city' => 'string',
		'state' => 'string',
		'address_line_1' => 'string',
		'address_line_2' => 'string',
		'user_id' => 'integer',
    ];
}
