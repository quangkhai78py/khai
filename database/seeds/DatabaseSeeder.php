<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_demo')->insert([
            'user_name'=>'tranquangkhai',
            'password'=>'12345',
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
