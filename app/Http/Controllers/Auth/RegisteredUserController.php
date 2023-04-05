<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::orderBy('name')->get();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant-name' => ['required', 'unique:' . Restaurant::class, 'string'],
            'address' => ['required', 'string'],
            'p_iva' => ['required', 'unique:' . Restaurant::class, 'size:11', 'string'],
            'image' => ['nullable', 'string'],
            'phone' => ['required', 'unique:' . Restaurant::class, 'string'],
            'delivery_cost' => ['nullable', 'numeric', 'max:10', 'min:0'],
            'min_order' => ['nullable', 'numeric', 'max:255', 'min:0'],
            'types' => ['required', 'exists:types,id'],
        ], [
            'name.required' => 'Il nome che hai inserito non è valido.',
            'name.string' => 'Il nome che hai inserito non è valido.',
            'name.max' => 'Il nome deve avere massimo :max caratteri.',
            'email.required' => 'La mail che hai inserito non è valida.',
            'email.string' => 'La mail che hai inserito non è valida.',
            'email.email' => 'La mail che hai inserito non è valida.',
            'email.max' => 'La mail deve avere massimo :max caratteri.',
            'email.unique' => 'La mail inserita è già registrata.',
            'password.required' => 'La password inserita non è valida.',
            'restaurant-name.required' => 'Devi inserire un nome ristorante valido.',
            'restaurant-name.unique' => 'Il nome ristorante che hai inserito è già presente.',
            'address.required' => 'Devi inserire un indirizzo valido.',
            'address.string' => 'Devi inserire un indirizzo valido.',
            'p_iva.required' => 'Devi inserire una partita iva valida.',
            'p_iva.string' => 'Devi inserire una partita iva valida.',
            'p_iva.unique' => 'La partita iva inserita è già presente.',
            'p_iva.size' => 'La partita iva deve avere :size caratteri.',
            'phone.required' => 'Devi inserire un numero di telefono valido.',
            'phone.string' => 'Devi inserire un numero di telefono valido.',
            'phone.unique' => 'Il  numero di telefono inserito è già presente.',
            'delivery_cost.numeric' => 'Il costo di consegna inserito non è valido.',
            'delivery_cost.max' => 'Il costo di consegna inserito deve essere massimo di :max €.',
            'delivery_cost.min' => 'Il costo di consegna inserito deve essere minimo di :min €.',
            'min_order.numeric' => 'Il valore dell\'ordine inserito non è valido.',
            'min_order.max' => 'Il valore dell\'ordine inserito deve essere massimo di :max €.',
            'min_order.min' => 'Il valore dell\'ordine inserito deve essere minimo di :min €.',
            'types.required' => 'Devi inserire almeno una tipologia di ristorante.',
            'types.exists' => 'La tipologia inserita non è valida.',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
