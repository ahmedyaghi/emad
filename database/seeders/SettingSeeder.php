<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'site_title' => 'منصة عماد',
            'site_main_title' => '',
            'site_sub_title' => '',
            'site_description' => '',
            'site_logo' => '',
            'site_phone' => '',
            'site_email' => '',
            'site_facebook' => '',
            'site_instagram' => '',
        ];

        foreach ($settings as $key => $value) {

            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
