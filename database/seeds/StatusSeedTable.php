<?php

use Illuminate\Database\Seeder;

class StatusSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_levels')->insert([
            ['id' => 1, 'status_code' => 1, 'description' => 'Draft'],
            ['id' => 2, 'status_code' => 2, 'description' => 'Submitted'],
            ['id' => 3, 'status_code' => 3, 'description' => 'Needs Modifying'],
            ['id' => 4, 'status_code' => 4, 'description' => 'Accepted - No modifications required'],
            ['id' => 5, 'status_code' => 5, 'description' => 'Archived']
        ]);
    }
}
