<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->primerNombre = 'Administrador';
        $user->segundoNombre = null;
        $user->primerApellido = 'Nivel';
        $user->segundoApellido = 'God';
        $user->fkTipoDocumento = 1;
        $user->numeroDocumento = 1036957215;
        $user->email = 'admin@admin.com';
        $user->password = '$2a$12$n8DFuRU4BrU8bls6AAcsfua0qkEijpThCdPv2rjmQyJsCV3hDv50a'; //Password: 1234

        $user->save();
    }
}
