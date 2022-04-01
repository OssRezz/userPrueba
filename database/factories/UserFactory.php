<?php

namespace Database\Factories;

use App\Models\tipodocumento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected  $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'primerNombre' => $this->faker->firstname(),
            'segundoNombre' => $this->faker->firstname(),
            'primerApellido' => $this->faker->lastName(),
            'segundoApellido' => $this->faker->lastName(),
            'fkTipoDocumento' => tipodocumento::inRandomOrder()->first()->id,
            'numeroDocumento' => $this->faker->numerify('###########'),
            'email' => $this->faker->unique()->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];
    }
}
