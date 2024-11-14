<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Traditional', 'Spicy', 'Low-Calorie', 'Vegan'];
        $len = count($categories);
        for($i=0;$i<$len;$i++){
            Category::insert([
                'name'=>$categories[$i]
            ]);
        }
    }
}
