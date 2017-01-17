<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create(['name'=>'title','value'=>'Laravel Blog']);
        Setting::create(['name'=>'author','value'=>'Erman Cibo']);
        Setting::create(['name'=>'description','value'=>'Crossover Laravel Blog']);
        Setting::create(['name'=>'keywords','value'=>'Crossover, Laravel, Blog']);
        Setting::create(['name'=>'facebook','value'=>'http://facebook.com']);
        Setting::create(['name'=>'twitter','value'=>'http://twitter.com']);
        Setting::create(['name'=>'github','value'=>'http://github.com']);
    }
}
