<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $restaurant_id = Restaurant::pluck('id')->toArray();
        $order_id = Order::pluck('id')->toArray();
        $dish_id = Dish::pluck('id')->toArray();
        //->Pivot->quantity


    }
}
