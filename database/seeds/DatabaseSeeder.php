<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesSeedTable::class);
        $this->call(UserSeedTable::class);
        $this->call(StatusSeedTable::class);
    }
}
