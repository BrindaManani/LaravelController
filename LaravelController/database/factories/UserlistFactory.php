<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Userlist>
 */
class UserlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'phone' => fake()->unique()->phoneNumber(),
            'role' => fake()->randomElement(['admin', 'user', 'manager', 'support']),
            'status' => fake()->randomElement(['active', 'inactive']),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'dob' => fake()->date('Y-m-d'),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'country' => fake()->country(),
            'pincode' => fake()->postcode(),
            'avatar' => fake()->imageUrl(200, 200, 'people'),
        ];
    }
}
