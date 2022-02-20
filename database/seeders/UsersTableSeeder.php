<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '浦山竣平',
            'email' => 's.urayama0601@gmail.com',
            'password' => 'Cfskrzt8'
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '浦山孝男',
            'email' => 't.nekotyann0228@gmail.com',
            'password' => 'urayama'
        ];
        DB::table('users')->insert($param);
    }
}
