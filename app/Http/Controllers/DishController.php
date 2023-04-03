<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        if (Arr::exists($data, 'image')) {
            $img_url = Storage::put('dishes', $data['image']);
            $data['image'] = $img_url;
        }
        $dish = new Dish();
        $dish->availability = $data['availability'] ? 1 : 0;
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
        return view('auth.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $this->validation($request);
        $data = $request->all();
        if (Arr::exists($data, 'image')) {
            if ($dish->image) {
                Storage::delete($dish->image);
            }
            $img_url = Storage::put('dishes', $data['image']);
            $data['image'] = $img_url;
        }
        $dish->availability = $data['availability'] ? 1 : 0;
        $dish->fill($data);
        $dish->slug = Str::slug($data['name'], '-');
        $dish->save();

        return to_route('auth.dishes.show', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->image) {
            Storage::delete($dish->image);
        }
        $dish->delete();
        return to_route('auth.dishes.index');
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
