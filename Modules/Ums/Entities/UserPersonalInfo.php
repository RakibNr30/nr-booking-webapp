<?php

namespace Modules\Ums\Entities;

use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class UserPersonalInfo extends BaseModel implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'user_personal_infos';

    protected $fillable = [
        'first_name',
		'last_name',
        'designation',
        'about',
		'mobile_no',
		'personal_email',
		'dob',
		'blood_group',
		'gender',
		'user_id',
    ];

    protected $hidden = [];

    protected $appends = [];

    protected $casts = [
        'first_name' => 'string',
		'last_name' => 'string',
		'designation' => 'string',
		'about' => 'string',
		'mobile_no' => 'string',
		'personal_email' => 'string',
		'dob' => 'timestamp',
		'blood_group' => 'string',
		'gender' => 'string',
		'user_id' => 'integer',
    ];
}
