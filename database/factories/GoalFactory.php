<?php

namespace Database\Factories;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Goal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function() {
                return User::factory()->create()->id;
            },
            'body' => $this->faker->paragraphs(rand(1, 2), true),
            'due_at' => (rand(0, 1)) ? now()->addDays(rand(1, 10)) : null,
            'public' => (bool) rand(0, 1),
        ];
    }
}
