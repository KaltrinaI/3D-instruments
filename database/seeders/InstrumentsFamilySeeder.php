<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstrumentsFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instruments_family')->insert(
            [
                [
                    'family' => "Brass"
                ],
                [
                    'family' => "Persussion"
                ],
                [
                    'family' => "Strings"
                ],
                [
                    'family' => "Woodwind"
                ]

            ]
        );
    }
}
