<?php

use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            [
                'type' => 'ENTIRE HOUSE',
            ],
            [
                'type' => 'PRIVATE ROOM',
            ],
            [
                'type' => 'ENTIRE APARTMENT',
            ],
            [
                'type' => 'ENTIRE LOFT',
            ],
            [
                'type' => 'SHARED ROOM',
            ],
        ]);
    }
}
