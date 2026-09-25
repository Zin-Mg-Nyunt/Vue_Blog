<?php

namespace Database\Factories;

use App\Models\Nrc;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Nrc>
 */
class NrcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nrc_number' => sprintf(
                                '%d/%s(N)%s',
                                fake()->numberBetween(1, 14),           
                                strtoupper(fake()->lexify('??????')),  
                                fake()->numerify('######')             
                            ),
            'address'=>fake()->address(),
            'user_id'=>User::factory()
        ];
    }
}
