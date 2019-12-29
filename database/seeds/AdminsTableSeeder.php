<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(App\Admin::class, 1)->create([
            'name' => 'Jon Fackrell',
            'email' => 'support@refbytes.com',
        ])->first();

        $admin->institutions()->attach(\App\Institution::first());
    }
}
