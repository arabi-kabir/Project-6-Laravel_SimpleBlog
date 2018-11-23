<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Arabi Kabir";
        $user->email = "latifkabirarabi@gmail.com";
        $user->password = bcrypt('111111');
        $user->admin = 1;
        $user->save();

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->about = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $profile->facebook = 'facebook.com';
        $profile->youtube = 'youtube.com';
        $profile->avatar = 'upload/avatar/boy.png';
        $profile->save();
    }
}
