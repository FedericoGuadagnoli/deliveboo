<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DelivebooController extends Controller
{
    public function sendRestaurantTypes()
    {
        $types = Type::orderBy('name')->get();

        foreach ($types as $type) {
            if ($type->image) $type->image = url('storage/' . $type->image);
        }

        return response()->json(compact('types'));
    }

    public function sendFilteredRestaurants(Request $request)
    {
        $types_names = $request->query('types');
        $types_id = Type::select('id')->whereIn('name', $types_names)->pluck('id')->toArray();

        $restaurants_collection =  DB::table('types')
            ->join('restaurant_type', 'types.id', '=', 'restaurant_type.type_id')
            ->join('restaurants', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
            ->select('restaurants.*')
            ->whereIn('restaurant_type.type_id', $types_id)
            ->groupBy('restaurants.name')
            ->get();

        $restaurants_models = [];

        foreach ($restaurants_collection as $restaurant) {
            $restaurants_models[] = Restaurant::find($restaurant->id);
        }

        $restaurants = [];

        foreach ($restaurants_models as $restaurant) {

            $restaurant_types_id = $restaurant->types->pluck('id')->toArray();


            if ($this->my_in_array($types_id, $restaurant_types_id)) $restaurants[] = $restaurant;
        }

        return response()->json(compact('restaurants'));
    }


    private function my_in_array($search, $source)
    {
        return (count(array_intersect($search, $source)) == count($search));
    }
}
