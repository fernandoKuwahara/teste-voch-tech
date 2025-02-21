<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Usuário Teste 1',
            'email' => 'teste1@example.com',
            'password' => Hash::make('senha123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuário Teste 2',
            'email' => 'teste2@example.com',
            'password' => Hash::make('senha123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuário Teste 3',
            'email' => 'teste3@example.com',
            'password' => Hash::make('senha123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuário Teste 4',
            'email' => 'teste4@example.com',
            'password' => Hash::make('senha123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuário Teste 5',
            'email' => 'teste5@example.com',
            'password' => Hash::make('senha123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuário Teste 6',
            'email' => 'teste6@example.com',
            'password' => Hash::make('senha123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
