<?php

namespace Database\Seeders;

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
        
        $this->call(UserSeeder::class);
        $this->call(ContractStatusSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(SiteSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(ClientHasPlatformSeeder::class);
    }
}
