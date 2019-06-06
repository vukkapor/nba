<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->each(function (App\User $user) {
            $user->news()->saveMany(factory(App\News::class, 20)->make());
        });
    }
}
