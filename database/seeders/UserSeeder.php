<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(25)->create();

        User::factory(1)->create([
            'name' => 'bambang',
            'email' => 'bambang@bambang.com',
            'level' => 2,
        ]);
    }
}
