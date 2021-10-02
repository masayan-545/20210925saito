<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DateTime;

class TodolistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bodys = ['aaaa','bbbb','cccc'];
        foreach ($bodys as $body) {
            DB::table('todolists')->insert([
                'content' => $body,
                'created_at' => new datetime(),
                'updated_at' => new datetime()
        ]);
        }
    }
}
