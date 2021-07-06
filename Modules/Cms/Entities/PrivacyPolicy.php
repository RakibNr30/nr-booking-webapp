<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class PrivacyPolicy extends BaseModel
{
    protected $table = 'privacy_policies';

    protected $fillable = [
		'description'
    ];

    protected $hidden = [];

    protected $casts = [
		'description' => 'string',
    ];
}
