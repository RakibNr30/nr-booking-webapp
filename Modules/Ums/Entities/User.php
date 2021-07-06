<?php

namespace Modules\Ums\Entities;

class User extends \App\Models\User
{
    protected $table = 'users';
    protected $guard_name = 'web';

    public function personalInfo() {
        return $this->hasOne(UserPersonalInfo::class, 'user_id', 'id');
    }

    public function residentialInfo() {
        return $this->hasOne(UserResidentialInfo::class, 'user_id', 'id');
    }
}