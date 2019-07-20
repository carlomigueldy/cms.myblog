<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'admin' => true,
            'password' => bcrypt('password'),
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => '',
            'about' => 'This is the Super-Administrator and has all access.',
            'github' => 'https://github.com/carlomigueldy'
        ]);
    }
}
