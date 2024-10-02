<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Roles;
use Illuminate\Database\Seeder;
use Database\Seeders\Attendance;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // --seed
        
        // This call the seeders:Roles
        $this->call([
            Roles::class,
        ]);

        User::factory(1)->create();

        // $this->call([
        //     Attendance::class,
        // ]);
    }
}
