@extends('layouts.app')

@section('content')
    <div class="container py-4">
        @if  ($dishes->count() === 0)
        <h1 class="text-center text-white mt-5">Non c'è nessun piatto ancora!</h1>
    @else
        <h1 class="text-center text-white">Lista Piatti</h1>
    @endif

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-success"><i
                class="fa-solid fa-plus me-2"></i>Aggiungi
            Piatto</a>
    </div>
        <div class="row justify-content-around mt-3">
            
            @foreach ($dishes as $dish)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3 py-3">

                    <div class="card">
                        <img class="image-card rounded-top" src="{{ asset('storage/' . $dish->image) }}"
                            alt="{{ $dish->slug }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p><strong>€ {{ $dish->price }}</strong></p>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-outline-primary"><i
                                        class="fa-solid fa-eye"></i>
                                    Mostra
                                </a>
                                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-pencil"></i>
                                    Modifica
                                </a>
                                <form class="delete-form d-inline" action="{{ route('admin.dishes.destroy', $dish->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Sei sicuro?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Elimina
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $dishes->links() }}
    </div>
@endsection
