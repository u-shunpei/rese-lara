<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Shop;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'shop_id' => '1',
            'user_id' =>'1',
            'num_of_users' => '1',
            'date' => '2020-02-12',
            'time' => '12:00:00'
        ];
        DB::table('reservations')->insert($param);
    }
}
