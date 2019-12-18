<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Contactinfo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User',20)->create();
        factory('App\Company',20)->create();
        factory('App\Job',20)->create();

        $categories =['Government','NGO','Bnaking','Networking','Unknowm'];

        foreach ($categories as $categorie){
            Category::create(['name'=> $categorie]);
        }

        Contactinfo::create([
            'addressLine1'=>'203 Fake St. Mountain View,',
            'addressLine2'=>'San Francisco, California, USA',
            'addressLine3'=>'',
            'serviceTime1'=>'Wednesdays at 6:30PM - 7:30PM ',
            'serviceTime2'=>'Fridays at Sunset - 7:30PM ',
            'serviceTime3'=>'Saturdays at 8:00AM - Sunset',
            'phone'=>'+1 232 3235 324',
            'email'=>'youremail@domain.com',
            'moreInfo'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.',
        ]);
    }
}
