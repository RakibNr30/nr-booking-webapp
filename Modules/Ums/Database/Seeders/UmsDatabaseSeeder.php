<?php

namespace Modules\Ums\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Modules\Ums\Entities\User;
use Modules\Ums\Entities\Role;
use Modules\Ums\Entities\Permission;

class UmsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // seed roles
        $this->seedRoles();
        // seed permissions
        $this->seedPermissions();
        // seed users
        $this->seedUsers();
    }

    private function seedRoles()
    {
        $data = json_decode(File::get(resource_path('seed/' . config('core.theme') . '/ums/role.json')), true);
        foreach ($data as $datum) {
            Role::create($datum);
        }
    }

    private function seedPermissions()
    {
        $data = json_decode(File::get(resource_path('seed/' . config('core.theme') . '/ums/permission.json')), true);
        foreach ($data as $datum) {
            $roles = $datum['roles'];
            unset($datum['roles']);
            $permission = Permission::create($datum);
            $permission->assignRole($roles);
        }
    }

    private function seedUsers()
    {
        // get data from json
        $data = json_decode(File::get(resource_path('seed/' . config('core.theme') . '/ums/users.json')), true);

        // process data
        foreach ($data as $datum) {
            // create users
            $user = User::create([
                "email" => $datum["account_info"]["email"],
                "password" => bcrypt("password"),
                "email_verified_at" => Carbon::now(),
                "profile_completeness" => 10,
                "approved_at" => Carbon::now(),
                "approved_by" => 1,
            ]);

            // assign role
            $user->assignRole($datum["account_info"]['roles']);

            /*// upload image from path
            $image_path = public_path("images/users/{$user->email}.jpg");
            if (File::exists($image_path)) {
                // remove old file from collection
                if ($user->hasMedia(config('core.media_collection.user.avatar'))) {
                    $user->clearMediaCollection(config('core.media_collection.user.avatar'));
                }
                // upload new file to collection
                $user->addMedia($image_path)
                    ->toMediaCollection(config('core.media_collection.user.avatar'));
            }*/

            // create personal info
            $datum["personal_info"]["user_id"] = $user->id;
            $user->personalInfo()->create($datum["personal_info"]);
        }
    }
}
