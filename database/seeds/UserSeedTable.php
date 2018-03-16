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
            ['id' => 1, 'name' => 'Rob Jones', 'email' => 'robert.jones7@go.edgehill.ac.uk', 'role_id' => 1, 'password' => 'GraduationRocks', 'student_no' => '22984348'],
            ['id' => 2, 'name' => 'David Walsh', 'email' => 'walsh_d@edgehill.ac.uk', 'role_id' => 2, 'password' => 'WebDevRocks', 'student_no' => null],
            ]);
      }
}
