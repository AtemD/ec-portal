<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ContractStatus;

class ContractStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('contract_statuses')->truncate();

        ContractStatus::factory()->create([
            'name' => 'Active',
            'color' => 'success'
        ]);

        ContractStatus::factory()->create([
            'name' => 'Terminated',
            'color' => 'warning'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
