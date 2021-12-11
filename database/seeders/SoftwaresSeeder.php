<?php

namespace Database\Seeders;

use App\Models\Worker;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SoftwaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('softwares')->truncate();

        for ($j = 0; $j < 1; $j++) {
            $softwares = [];
            for ($i = 0; $i < 1001; $i++) {
                $softwares[] = [
                    'producer' => $faker->words('2', true),
                    'serial_number' => $faker->sentence(),
                    'name' => $faker->firstName(),
                    'worker_id' => $faker->numberBetween(1, Worker::all()->count()),
                    'description' => $faker->sentence(9),
                    'date_of_buy' => $faker->date(),
                    'expiry_date' => $faker->date(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        DB::table('softwares')->insert($softwares);
    }
}
