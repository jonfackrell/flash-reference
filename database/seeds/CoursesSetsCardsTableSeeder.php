<?php

use Illuminate\Database\Seeder;

class CoursesSetsCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institution = \App\Institution::first();
        $user = \App\User::first();

        $courses = factory(App\Course::class, 5)->create([
            'institution_id' => $institution->id,
            'user_id' => $user->id,
        ])->each(function($course) use ($institution, $user){
            $sets = factory(App\Set::class, 5)->create([
                'institution_id' => $institution->id,
                'user_id' => $user->id,
                'course_id' => $course->id,
            ])->each(function($set){
                $cards = factory(App\Card::class, 10)->create([
                    'set_id' => $set->id,
                ]);
            });
        });
    }
}
