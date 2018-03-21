<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Patient::class, 32)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Patient::class)->make());
        });
    }
}
