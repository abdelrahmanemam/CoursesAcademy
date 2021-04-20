<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'abdelrahman',
            'password' =>  \Illuminate\Support\Facades\Hash::make('123456')
        ]);
    }
}
