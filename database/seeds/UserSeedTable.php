<?php

use Illuminate\Database\Seeder;

class UserSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 2, 'name' => 'David Walsh', 'email' => 'walsh_d@edgehill.ac.uk', 'role_id' => 2, 'password' => '$2y$10$m/C7Bkdp9Lo7TgBFS1R5ou/oXxf5K64U8ImQK6GN6v7PrSqkRcfaC', 'student_no' => null, 'supervisor_id' => null],
            ['id' => 1, 'name' => 'Rob Jones', 'email' => 'robert.jones7@edgehill.ac.uk', 'role_id' => 1, 'password' => '$2y$10$4rRqAuVdlTveHQ7e1oZRjuSGQQglQgRNG/vkDe3y1X/5NfUiDq3ya', 'student_no' => '22984348', 'supervisor_id' => 2],
            ]);
      }
}
