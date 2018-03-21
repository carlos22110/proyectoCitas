<?php

use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Appointment::class, 30)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Appointment::class)->make());
        });
    }
}
