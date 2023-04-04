@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-white">Lista Piatti</h1>
        <div class="row dashboard justify-content-around">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-success"><i
                        class="fa-solid fa-plus me-2"></i>Aggiungi
                    Piatto</a>
            </div>
            @foreach ($dishes as $dish)
                <div class="col-4 p-4">

                    <div class="card">
                        <img class="image-card" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->slug }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p><strong>€ {{ $dish->price }}</strong></p>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-outline-primary"><i
                                        class="fa-solid fa-eye"></i>
                                    Osserva
                                </a>
                                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-pencil"></i>
                                    Modifica
                                </a>
                                <form class="delete-form d-inline" action="{{ route('admin.dishes.destroy', $dish->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"><i
                                            class="fa-solid fa-trash-can"></i>
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
