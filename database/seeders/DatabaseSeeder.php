<?php

namespace Database\Seeders;

use App\Models\Publisher;
use App\Models\ScientificArea;
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
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);
        
        ScientificArea::create([
            'name' => 'Matemática'
        ]);       
        ScientificArea::create([
            'name' => 'Fisica'
        ]);ScientificArea::create([
            'name' => 'Quimica'
        ]);ScientificArea::create([
            'name' => 'Ciência da Computação'
        ]);ScientificArea::create([
            'name' => 'Gestão'
        ]);ScientificArea::create([
            'name' => 'Economia'
        ]);
        ScientificArea::create([
            'name' => 'Arquitetura'
        ]);
        Publisher::create([
            'name' => 'Independente',
            'addresss' => 'Luanda',
        ]);
    }
}
