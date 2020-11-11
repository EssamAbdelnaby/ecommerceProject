<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Brand::create([
            'name'          =>  'brand Name',
            'description'   =>  'brand description',
        ]);

        factory('App\Models\Brand', 10)->create();
    }
}
