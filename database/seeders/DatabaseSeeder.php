<?php

namespace Database\Seeders;

use App\Models\tipodocumento;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        tipodocumento::factory(1000)->create();
        User::factory(1000)->create();
    }
}
