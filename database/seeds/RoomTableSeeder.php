<?php

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => str_random(12),
                'address' => '20 nguyen an ninh ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '20 tran dai nghia ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '20 truong dinh ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '20 xuan thuy ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '20 hoang quoc viet ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '20 lang ha ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '230 xa dan ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '20 nguyen chi thanh ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '166 doi can ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => str_random(12),
                'address' => '320 tran khat chan ha noi',
                'price' => 12.5,
                'summary' => str_random(100),
                'bed_room' => mt_rand(0, 3),
                'bath_room' => mt_rand(0, 3),
                'is_tv' => (bool) mt_rand(0, 1),
                'is_kitchen' => (bool) mt_rand(0, 1),
                'is_air' => (bool) mt_rand(0, 1),
                'is_heating' => (bool) mt_rand(0, 1),
                'is_internet' => (bool) mt_rand(0, 1),
                'active' => (bool) mt_rand(0, 1),
                'verified' => (bool) mt_rand(0, 1),
                'room_type' => mt_rand(1, 5),
                'owner_id' => mt_rand(1, 6),
                'city_id' => mt_rand(1, 25),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
