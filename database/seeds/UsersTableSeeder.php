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
        DB::table('users')->insert([
            ['username' => 'Atlas一朗'],
            ['mail' => '123@mail'],
            ['password' => bcrypt('12345')] //bcryptメソッドはパスワードを暗号化する。
        ]);
    }
}
