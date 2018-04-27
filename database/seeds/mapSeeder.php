<?php

use Illuminate\Database\Seeder;

class mapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        // $i=0;
        // for($i=0;$i<10;$i++)
        DB::table('maps')->insert([
            'name' => str_random(10),
            'latitude' => str_random(10),
            'longitude' => str_random(10),
            
        ]);
    }
}
