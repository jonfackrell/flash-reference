<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class, 1)->create([
            'name' => 'Jon Fackrell',
            'email' => 'jon.fackrell@gmail.com',
        ])->first();

        $users = factory(App\User::class, 10)->create();
    }
}
