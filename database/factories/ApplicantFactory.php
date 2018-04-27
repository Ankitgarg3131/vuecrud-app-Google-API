<?php

use Faker\Generator as Faker;

$factory->define(App\Applicant::class, function (Faker $faker) {
    return [
        
        'application_number' => $faker->randomElement(array ('JHC/18/PA/','JHC/18/ST/')),
        'user_id' => $faker->numberBetween($min = 1),
        'post_id' => $faker->randomNumber,
        'submitted_at'=>$faker->dateTime($max = 'now', $timezone = null),
        
        'status' => $faker->randomElement(array ('Submitted','Saved')),
        'name'=>$faker->firstNameMale,
        'father_name'=>$faker->firstNameMale,
          'father_last_name'=>$faker->lastname,    
          'place_of_birth'=>$faker->date($format = 'Y-m-d', $max = 'now'),
          'nationality'=>$faker->country,
          'communication_address'=>$faker->address,
          'permanent_address'=>$faker->address,
          'is_handicapped'=>'0',
          'is_government_undertaking'=>'1',
          'government_undertaking_post'=>$faker->jobTitle,
          'government_undertaking_name'=>$faker->company,
          'government_undertaking_start_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
          'special_qualification'=>$faker->lexify('??? Engineer'),
          'payment_amount'=>$faker->numberBetween($min = 1000, $max = 9000),
          'payment_transaction_id'=>$faker->numerify('mojo###'),
          'sex'=>$faker->randomElement(array ('male','female')) ,
          'payment_request_id'=>$faker->swiftBicNumber  ,
          'payment_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
          'created_by'=>$faker->numberBetween($min = 10, $max = 99),
          
          'gender'=>$faker->randomElement(array ('male','female')),
          
       // 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        //'remember_token' => str_random(10),
        ];

});
