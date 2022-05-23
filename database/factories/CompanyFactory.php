<?php

namespace Database\Factories;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    return [
            'user_id' => User::factory(),
            'employee_id' => Employee::factory(),
            'name' => $this->faker->unique()->word(),
            'email' => $this->faker->unique()->email(),
            'logo' => $this->faker->image('storage/app/public/',640,480, null, false),
            'website' => $this->faker->unique()->url()
        ];
    }
}
