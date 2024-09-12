<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */

     // Run this to seed: php artisan db:seed --class=Roles
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Doctor', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Patient', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Staff', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
