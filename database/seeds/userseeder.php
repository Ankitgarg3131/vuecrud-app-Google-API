<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
        for($i=0;$i<10;$i++)
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            
        ]);
    }
}
