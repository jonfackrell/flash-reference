<?php

namespace Tests\Feature;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A user can visit the registration page.
     *
     * @return void
     */
    public function testShowUserRegistration()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * A user can register for a free trial.
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        $faker = \Faker\Factory::create();
        $name = $faker->name;
        $email = $faker->email;
        $password = $faker->password;
        $institution = $faker->company;
        $lms = $faker->randomElement([
            'Blackboard',
            'Brightspace',
            'Canvas',
            'Moodle',
            'Sakai',
            'Schoology',
            'Other',
        ]);

        // prevent validation error on captcha
        NoCaptcha::shouldReceive('verifyResponse')
            ->once()
            ->andReturn(true);

        $response = $this->post('/register', [
            'g-recaptcha-response' => '1',
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
            'institution' => $institution,
            'lms' => $lms,
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email,
        ]);

        $this->assertDatabaseHas('institutions', [
            'name' => $institution,
        ]);

    }
}
