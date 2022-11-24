<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();
        
        return [
            'module_id' => Module::factory(),
            'name'=> $name,
            'url' => Str::slug($name), // André Luis to andre-luis
            'video' => Str::random(),
            
        ];
    }
}
