<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Administrator::class, 3)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Administrator::class)->make());
        });
    }
}