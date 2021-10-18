<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i < 4 ; $i++) { 

            $title=$faker->sentence(6);

            DB::table('posts')->insert([
                'category_id'=>rand(1,4),
                'title'=>$title,
                'content'=>$faker->paragraph(6),
                'slug'=>Str::slug($title),
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>now()
            ]);
            
        }
    }
}
