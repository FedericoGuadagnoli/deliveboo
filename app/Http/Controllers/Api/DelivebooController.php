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

        return response()->json(compact('types'));
    }
}
