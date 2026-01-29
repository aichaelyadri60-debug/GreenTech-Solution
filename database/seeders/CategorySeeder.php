<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Category=[
            ['name' =>'Plantes'],
            ['name' =>'Graines'],
            ['name' =>'Outils']
        ];
        DB::table('categories')->insert($Category);
    }
}
