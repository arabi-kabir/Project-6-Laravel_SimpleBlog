<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting();
        $setting->site_name = "Tiny Blog";
        $setting->contact_number = '123456789';
        $setting->contact_email = 'tinyBlog@gmail.com';
        $setting->address = 'Dhaka, Bangladesh';
        $setting->save();
    }
}
