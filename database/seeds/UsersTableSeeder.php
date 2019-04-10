<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->login = "admin";
        $admin->password = password_hash('admin', PASSWORD_BCRYPT);
        $admin->save();
    }
}
