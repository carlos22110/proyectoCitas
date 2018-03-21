<?php

use Illuminate\Database\Seeder;

class SymptomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Symptom::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Symptom::class)->make());
        });
    }
}
