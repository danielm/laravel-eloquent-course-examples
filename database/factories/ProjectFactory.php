<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4, true),// (number of words, variable number?),
            'user_id' => \App\Models\User::all()->random(),
            'company_id' => \App\Models\Company::all()->random(),
            'city_id' => \App\Models\City::all()->random(),
            'execution_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'is_active' => $this->faker->boolean
        ];
    }
}
