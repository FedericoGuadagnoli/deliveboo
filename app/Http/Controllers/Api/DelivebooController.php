<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

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
}
