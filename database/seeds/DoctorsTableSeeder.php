<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Doctor::class, 15)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Doctor::class)->make());
        });
    }
}
