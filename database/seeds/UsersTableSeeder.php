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
        $userService = new \App\Services\UsersService();
        $userService->updateOrCreate(['username' => 'autobot'], [
            'id' => 1,
            'device_code' => str_random('20'),
            'username' => 'autobot',
        ]);
    }
}
