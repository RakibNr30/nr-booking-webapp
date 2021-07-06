<?php

namespace Modules\Ums\Entities;

class Role extends \Spatie\Permission\Models\Role
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
		'description',
		'guard_name',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'name' => 'string',
		'description' => 'string',
		'guard_name' => 'string',
    ];
}
