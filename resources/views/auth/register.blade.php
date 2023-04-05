@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class=" text-center text-white my-3">
            <h1 class="fw-bold">DeliveBoo</h1>
            <h4>Il miglior delivery-service del mondo!</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold d-flex align-items-baseline">
                        <figure>
                            <img class="logo-login"
                                src="https://d92mrp7hetgfk.cloudfront.net/images/sites/misc/Boolean/original.png?1623187562"
                                alt="">
                        </figure>
                        <span class="ms-2">Entra nel mondo DeliveBoo!</span>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="restaurant-name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                <div class="col-md-6">
                                    <input id="restaurant-name" type="text"
                                        class="form-control @error('restaurant-name') is-invalid @enderror"
                                        name="restaurant-name" value="{{ old('restaurant-name') }}" required
                                        autocomplete="restaurant-name" autofocus>

                                    @error('restaurant-name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text"
                                        class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                                        value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>

                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="delivery_cost"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Costo consegna') }}</label>

                                <div class="col-md-6">
                                    <input id="delivery_cost" type="number"
                                        class="form-control @error('delivery_cost') is-invalid @enderror"
                                        name="delivery_cost" value="{{ old('delivery_cost') }}"
                                        autocomplete="delivery_cost" autofocus min='0' max='10'>

                                    @error('delivery_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="min_order"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Ordine minimo') }}</label>

                                <div class="col-md-6">
                                    <input id="min_order" type="number"
                                        class="form-control @error('min_order') is-invalid @enderror" name="min_order"
                                        value="{{ old('min_order') }}" autocomplete="min_order" autofocus
                                        min='0'>

                                    @error('min_order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for=""
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tipologia Ristorante') }}</label>

                                <div class="col-md-6">
                                    @forelse ($types as $type)
                                        <div class="form-check form-check-inline @error('types') is-invalid @enderror">
                                            <input class="form-check-input" type="checkbox"
                                                id="type-{{ $type->id }}" value="{{ $type->id }}"
                                                name="types[]" {{-- @if (count(old()) && !old('types')) @elseif(in_array($type->id, old('types', $project_technologies ?? []))) checked @endif --}}>
                                            <label class="form-check-label"
                                                for="type-{{ $type->id }}">{{ $type->name }}</label>
                                        </div>
                                    @empty
                                        -
                                    @endforelse
                                    @error('types')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Registrati!') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
