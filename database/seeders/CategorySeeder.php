<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=["Eğlence","Bilişim","Gezi","Teknoloji"];

        foreach ($categories as $category => $value) {
            DB::table('categories')->insert([
                'name'=>$category = $value,
                'slug'=>Str::slug($category = $value),
                'created_at'=>now(),
                'updated_at'=>now()

            ]);
        }
         
        
    }
}
