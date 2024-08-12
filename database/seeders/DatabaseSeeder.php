<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Empresa;
use App\Models\Expediente;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(30)->create();
        Empresa::factory(30)->create();
        Carrera::factory(8)->create();

        User::factory()->create([
            'name' => 'admin',
            'lastname' => 'admin',            
            'dni' => '28041431',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789')
        ]);


       
    }
}
