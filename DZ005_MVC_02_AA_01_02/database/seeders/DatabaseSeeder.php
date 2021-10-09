<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacultySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(ProfessorSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(UserSeeder::class);
    }
}
