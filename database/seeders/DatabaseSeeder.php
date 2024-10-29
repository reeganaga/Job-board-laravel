<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Employer;
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
        User::factory(300)->create();

        User::factory()->create([
            'name' => 'Rega G',
            'email' => 'rega@example.com',
        ]);

        $users = \App\Models\User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all();
        for ($i = 0; $i < 100; $i++) {
            # code...
            Career::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }
    }
}
