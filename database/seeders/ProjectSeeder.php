<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50 ; $i++) { 
            $newProject = new Project ();
            $newProject->title = $faker->sentence(10);
            $newProject->image = $faker->paragraph(100);
            $newProject->description = $faker->paragraph(100);
            $newProject->slug = $faker->slug();
            $newProject->save();
        }
    }
}
