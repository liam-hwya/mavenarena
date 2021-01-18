<?php

use App\UserProfile;
use Illuminate\Database\Seeder;

class UsersProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UsersProfileSeeder::class,7)->create();
    }
}
