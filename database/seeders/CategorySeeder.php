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
        $categories = ['Traditional', 'Spicy', 'Non-Spicy', 'Vegan'];
        $len = count($categories);
        for($i=0;$i<$len;$i++){
            DB::table('categories')->insert([
                'name'=>$categories[$i]
            ]);
        }
    }
}
