<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Modules\Setting\Entities\Api;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // get data from json
        $settingData = json_decode(File::get(resource_path('seed/' . config('core.theme') . '/settings/settings.json')), true);

        // api seeding
        $api = $settingData['api'];
        Api::create($api);
    }
}
