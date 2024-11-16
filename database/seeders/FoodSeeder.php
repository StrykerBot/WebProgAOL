<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = ['Ketoprak', 'Gado-gado', 'Salad', 'Rujak', 'Nasi Goreng'];
        $len = count($foods);
        for($i=0;$i<$len;$i++){
           Food::insert([
                'name'=>$foods[$i],
                'price'=>rand(30000, 100000),
                'img_path'=>$foods[$i].'.jpeg',
                'description' => fake()->sentence(10)
            ]);
        }
    }
}
