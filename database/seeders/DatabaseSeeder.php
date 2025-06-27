<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Voeg de default admin toe
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'admin',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password!32'),
                'role' => 'admin', // Zorg dat je een 'role' kolom hebt
            ]
        );

        // Roep andere seeders aan
        $this->call([
            ServiceSeeder::class,
            BarberSeeder::class,
            BookingSeeder::class,
            FAQSeeder::class,
            // Voeg hier eventueel andere seeders toe
        ]);
    }
}