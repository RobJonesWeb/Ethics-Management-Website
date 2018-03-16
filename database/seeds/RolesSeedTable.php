<?php

use Illuminate\Database\Seeder;

class RolesSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'position' => 'Student'],
            ['id' => 2, 'position' => 'Supervisor'],
        ]);
    }
}
