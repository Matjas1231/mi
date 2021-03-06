<?php

namespace Database\Seeders;

use App\Models\ComputerTypes;
use App\Models\Worker;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('computers')->delete();

        for ($j = 0; $j < 1; $j++) {
            $computers = [];
            for ($i = 0; $i < $faker->numberBetween(100, 300); $i++) {
                $computers[] = [
                    'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Fujitsu']),
                    // 'brand' => $faker->randomElement(),
                    'model' => $faker->word(),
                    'type_id' => $faker->numberBetween(ComputerTypes::all()->first()->id, ComputerTypes::all()->last()->id),
                    'processor' => $faker->words(4, true),
                    'motherboard' => $faker->words(4, true),
                    'description' => $faker->words(30, true),
                    'ram' => $faker->words(2, true),
                    'worker_id' => $faker->numberBetween(Worker::all()->first()->id, Worker::all()->last()->id),
                    'ip_address' => $faker->ipv4(),
                    'mac_address' => $faker->macAddress(),
                    'computer_name' => $faker->word(),
                    'date_of_buy' => $faker->date(),
                    'serial_number' => $faker->sentence(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        DB::table('computers')->insert($computers);
    }
}
