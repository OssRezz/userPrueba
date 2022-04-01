<?php

namespace Database\Factories;

use App\Models\tipodocumento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tipodocumento>
 */
class TipoDocumentoFactory extends Factory
{
    protected  $model = tipodocumento::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tipoDocumento' => $this->faker->randomElement(['Cedula de ciudadania', 'Cedula de extranjeria', 'Tarjeta de identidad', 'Pasaporte'])
        ];
    }
}
