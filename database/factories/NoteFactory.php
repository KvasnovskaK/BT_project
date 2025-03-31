<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class NoteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOredr()->first()->id,
            'title' => fake()->realText(15),
            'body' => fake()->realText(1000)
        ];
    }
}