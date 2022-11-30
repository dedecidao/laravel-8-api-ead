<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportFactory extends Factory
{

    
    protected $model = Support::class;
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    public function definition()
    {
        return [
            'user_id'   => User::factory(),
            'lesson_id' => Lesson::factory(),
            'status' => 'P',
            'description' => $this->faker->sentence(20)

        ];
    }
}
