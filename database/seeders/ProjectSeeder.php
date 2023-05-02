<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technology_ids = Technology::all()->pluck('id')->all();
        for ($i = 0; $i < 50; $i++) {

            $project = new Project();
            $project->title = $faker->unique()->sentence($faker->numberBetween(2, 6));
            $project->client = $faker->name(15);
            $project->description = $faker->text(500);
            $project->url = $faker->url();
            $project->slug = Str::slug($project->title, '-');
            
            $project->save();

            $project->technologies()->attach($faker->randomElements($technology_ids, rand(0, 5)));
        }
    }
}
