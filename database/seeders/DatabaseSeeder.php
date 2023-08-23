<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();

        User::create([
            'name' => 'Kuur',
            'email' => 'dickynakiri@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'status' => 'activated',
            'phone' => '0851 5618 6156',
            'address' => 'Jl. Baturaden, Jember, Jawa Timur, Indonesia',
            'is_admin' => 1,
        ]);
    }
}
