<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
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
            'name' => 'Admin nombre ',
            'last_name'=>'Admin apellido',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$/5FfI/QTYgGn9HptYmVI7uGkuyf4vSjBeDyChvl.yggIyiZFMF/ee', // 123456789
            'remember_token' => Str::random(10),
            'rol' => 'admin',
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
