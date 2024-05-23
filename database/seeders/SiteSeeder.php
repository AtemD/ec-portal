<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Site;
use App\Models\Client;
class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sites')->truncate();

        // For each client create 1 to 6 sites
        $clients = Client::all();
        $clients->each(function($client) {
            Site::factory()->times(mt_rand(1, 12))->create([
                'client_id' => $client->id, 
            ]);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
