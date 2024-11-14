<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Food;

class CategoryFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $len = Food::all()->count();
        for($i=1;$i<=$len;$i++){
            $cats = rand(1,4);
            $other_cats = (($cats+1)%4)+1;
            DB::table('categories_foods')->insert([
                'food_id'=>$i,
                'category_id'=>$cats]);
            DB::table('categories_foods')->insert([
                'food_id'=>$i,
                'category_id'=>$other_cats
            ]);
        }
    }
}
