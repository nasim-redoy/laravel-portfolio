<?php

namespace Database\Seeders;

use App\Models\skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skillList = ['HTML','CSS','JAVASCRIPT','PHP-LARAVEL','WORDPRESS CUSTOMIZATION','JQUERY & AJAX'];

        foreach ($skillList as $skillName){
            $skill = new skill();
            $skill->name = $skillName;
            $skill->percentage =  rand(60,99);
            $skill->save();
        }

    }
}
