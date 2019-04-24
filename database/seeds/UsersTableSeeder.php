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
        $admin->login = "birdlife_admin";
        $admin->password = password_hash('^zQry9BPWCD5qs', PASSWORD_BCRYPT);
        $admin->save();
    }
}
