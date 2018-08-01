<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Thach',
                'email' => 'thach' . '@email.com',
                'password' => bcrypt('123456'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Son',
                'email' => 'son' . '@email.com',
                'password' => bcrypt('123456'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Truong',
                'email' => 'truong' . '@email.com',
                'password' => bcrypt('123456'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Kien',
                'email' => 'kien' . '@email.com',
                'password' => bcrypt('123456'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Hung',
                'email' => 'hung' . '@email.com',
                'password' => bcrypt('123456'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Tung',
                'email' => 'tung' . '@email.com',
                'password' => bcrypt('123456'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
