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
        // $this->call(UsersTableSeeder::class);
        $data = [
            [
                'email' => 'manduy@gmail.com',
                'password' => bcrypt('123456'),
            ]
        ];
        DB::table('mw_user')->insert($data);
    }
}
