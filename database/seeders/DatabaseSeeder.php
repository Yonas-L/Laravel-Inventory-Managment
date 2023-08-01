<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * 
     */
    public function run() : void
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            BranchSeeder::class,
            UserChatSeeder::class
        ]);
    }
}
