<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Attendance extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $userId = 1;

        // Run this to seed: php artisan db:seed --class=Roles
        DB::table('attendances')->insert([
            [
                'user_id' => $userId,
                'status' => 'login',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => $userId,
                'status' => 'break1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => $userId,
                'status' => 'break2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => $userId,
                'status' => 'lunch',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
