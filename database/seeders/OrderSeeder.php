<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $order = new Order();
            $order->first_name = $faker->firstName();
            $order->last_name = $faker->lastName();
            $order->email = $faker->email();
            $order->address = $faker->streetAddress();
            $order->phone = $faker->phoneNumber();
            $order->payment_status = $faker->boolean();
            $order->total_price = $faker->randomFloat(2, 5, 500);
            $order->delivery_time = $faker->time('H:i');
            $order->save();
        }
    }
}
