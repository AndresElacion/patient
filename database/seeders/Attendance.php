<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Attendance extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user first
        $user = User::factory()->create([
            'role_id' => 2, // Assuming role_id 2 is for Doctor or whichever role you want
        ]);

        // Insert attendance records for the created user
        DB::table('attendances')->insert([
            [
                'user_id' => $user->id,
                'status' => 'login',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => $user->id,
                'status' => 'break1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => $user->id,
                'status' => 'break2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => $user->id,
                'status' => 'lunch',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
