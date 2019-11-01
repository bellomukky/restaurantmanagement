<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('food_items')->insert([
            'name'=>'Jollof Rice',
            'slug'=>'jollof-rice',
            'price'=>20,
            'discount'=>0,
            'tags'=>'jollof rice,jollof_rice,party rice,jollof-rice,rice',
            'image'=>'images/food5.jpg',
            'menu_id'=>2
        ]); 

         DB::table('food_items')->insert([
            'name'=>'Fried Rice',
            'slug'=>'fried-rice',
            'price'=>15,
            'discount'=>0,
            'tags'=>'fried rice,fried_rice,party rice,fried-rice,rice',
            'image'=>'images/food7.jpg',
            'menu_id'=>2
        ]);

          DB::table('food_items')->insert([
            'name'=>'Shawarma',
            'slug'=>'shawarma',
            'price'=>11,
            'discount'=>0,
            'tags'=>'shawarma,snacks,snack',
            'image'=>'images/food4.jpg',
            'menu_id'=>1
        ]);
    }
}
