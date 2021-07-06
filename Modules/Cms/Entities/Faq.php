<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class Faq extends BaseModel
{
    protected $table = 'faqs';

    protected $fillable = [
        'question',
		'answer'
    ];

    protected $hidden = [];

    protected $casts = [
        'question' => 'string',
		'answer' => 'string',
    ];
}
