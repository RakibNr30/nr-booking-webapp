<?php

namespace Modules\Setting\Entities;

use App\Models\BaseModel;

class Api extends BaseModel
{
    protected $table = 'apis';

    protected $fillable = [
        'sandbox_username',
		'sandbox_password',
		'sandbox_secret',
		'sandbox_certificate',
		'sandbox_app_id',
		'currency',
		'stripe_key',
		'stripe_secret',
    ];

    protected $hidden = [];

    protected $casts = [
        'sandbox_username' => 'string',
        'sandbox_password' => 'string',
        'sandbox_secret' => 'string',
        'sandbox_certificate' => 'string',
        'sandbox_app_id' => 'string',
        'currency' => 'string',
        'stripe_key' => 'string',
        'stripe_secret' => 'string',
    ];
}
