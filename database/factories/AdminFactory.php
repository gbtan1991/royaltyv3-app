<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName,
            'password' => Hash::make('password'), // default password
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'avatar' => $this->faker->imageUrl(100, 100, 'people'), // Optional avatar image URL
            'admin_type' => $this->faker->randomElement(['super_admin', 'admin', 'moderator']),
            'account_status' => $this->faker->randomElement(['pending', 'active', 'suspended']),
            'last_login_at' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
            'remember_token' => Str::random(10),
        ];
    }
}
