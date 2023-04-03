<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $dishes = Dish::where('restaurant_id', $user_id)->paginate();

        return view('auth.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dish = new Dish();
        return view('auth.dishes.create', compact('dish'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $data = $request->all();
        $restaurant_id = Auth::user()->restaurant->id;
        $dish = new Dish();
        $dish->fill($data);
        $dish->slug = Str::slug($data['name'], '-');
        $dish->restaurant_id = $restaurant_id;
        $dish->save();

        return to_route('auth.dishes.show', $dish->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('auth.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //
    }

    private function validation(Request $request)
    {
        $request->validate(
            [
                'name' => 'string|required|min:5',
                'description' => 'string|required|min:5',
                'price' => 'required|numeric|min:0.1|max:150',
                'availability' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpeg,jpg,svg,png',
            ],
            [
                'name.required' => 'Devi inserire un nome.',
                'name.string' => 'Il nome che hai inserito non è valido.',
                'name.min' => 'Il nome deve avere minimo :min caratteri.',
                'description.required' => 'Devi inserire una descrizione.',
                'description.string' => 'La descrizione non è valida.',
                'description.min' => 'La descrizione deve avere minimo :min caratteri.',
                'price.required' => 'Il prezzo è obbligatorio.',
                'price.numeric' => 'Il prezzo inserito non è valido.',
                'price.min' => 'Il prezzo minimo è di :min €.',
                'price.max' => 'Il prezzo massimo è di :max €.',
                'availability.boolean' => 'Il valore inserito per la disponibilità non è valido.',
                'image.mimes' => 'Le estensioni valide per le immagini sono :mimes.',
                'image.image' => 'L\'immagine deve essere un\'immagine valida.',
            ]
        );
    }
}
