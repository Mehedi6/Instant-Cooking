<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ratings;

class RatiingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratingRecords=[
            ['id'=>1,'user_id'=>1,'recipe_id'=>12,'review'=>'very good','rating'=>5],
            ['id'=>2,'user_id'=>2,'recipe_id'=>1,'review'=>'Excellent','rating'=>5],
            ['id'=>3,'user_id'=>3,'recipe_id'=>2,'review'=>'motamuti','rating'=>3],
        ];
        Ratings::insert($ratingRecords);
    }
    
}
