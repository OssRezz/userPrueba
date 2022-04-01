<?php

namespace Database\Seeders;

use App\Models\tipodocumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cedulaCiudadania = new tipodocumento();
        $cedulaCiudadania->tipoDocumento = 'Cedula de ciudadania';
        $cedulaCiudadania->save();

        $cedulaExtranjeria = new tipodocumento();
        $cedulaExtranjeria->tipoDocumento = 'Cedula de extranjeria';
        $cedulaExtranjeria->save();

        $tarjetaIdentidad = new tipodocumento();
        $tarjetaIdentidad->tipoDocumento = 'Tarjeta de identidad';
        $tarjetaIdentidad->save();

        $pasaporte = new tipodocumento();
        $pasaporte->tipoDocumento = 'Pasaporte';
        $pasaporte->save();
    }
}
