<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('menus')->insert([
            'name'=>'Snacks',
            'slug'=>'snacks',
            'tags'=>'snacks,refreshments,snack',
            'image'=>'images/food10.jpg'
        ]);
         DB::table('menus')->insert([
            'name'=>'Rice',
            'slug'=>'rice',
            'tags'=>'rice,jollof rice,party rice,fried rice',
            'image'=>'images/food3.jpg'
        ]); 
    }
}
