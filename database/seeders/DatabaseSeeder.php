<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("..\..\Downloads\data_csv.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Models\country::create([
                    "name" => $data['0'],
                    "abbreviation" => $data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
        \App\Models\postal::factory(10)->create();
        \App\Models\address::factory(10)->create();
        \App\Models\customer::factory(10)->create();
        \App\Models\order::factory(25)->create();
        \App\Models\author::factory(25)->create();
        \App\Models\publisher::factory(15)->create();
        \App\Models\genre::factory(9)->create();
        \App\Models\book::factory(30)->create();
        \App\Models\BookGenre::factory(30)->create();
        \App\Models\store::factory(10)->create();
        \App\Models\depot::factory(50)->create();
        \App\Models\department::factory(3)->create();
        \App\Models\OrderLine::factory(30)->create();
        \App\Models\employee::factory(50)->create();
    }
}
