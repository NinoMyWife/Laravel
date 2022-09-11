<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstname(),
            'lastname' => $this->faker->lastname(),
            'login' => $this->faker->word(rand(4, 9), true),
            'firstname' => $this->faker->firstname(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'address' => $this->faker->words(10, true),
            'zipcode' => rand(5, 5),
            'city' => $this->faker->city(),
            'address' => $this->faker->words(10, true),
            'hired_date'=> $this->faker->dateTimeBetween(now()->subYear(), now()->subDay(1)),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
