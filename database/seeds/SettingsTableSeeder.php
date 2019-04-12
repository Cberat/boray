<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingArr = [
            [
                "key" => "logo",
                "value" => null
            ],[
                "key" => "title",
                "value" => "Boray"
            ],[
                "key" => "description",
                "value" => null
            ],[
                "key" => "keywords",
                "value" => null
            ],[
                "key" => "author",
                "value" => null
            ]
        ];

        DB::table("settings")->insert($settingArr);
    }
}
