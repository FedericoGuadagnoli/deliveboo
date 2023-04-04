@extends('layouts.app')

@section('content')
{{-- <div class="container py-3">
    <div class="card mb-3 mt-5">
        <img src="https://www.frescadelivery.com/wp-content/uploads/2020/06/Antipasto-misto-for-2-1-scaled-e1619175792723.jpg" class="card-img-top img-show" alt="...">
        <div class="card-body">
        <h5 class="card-title">{{ $dish->name }}</h5>
        <p class="card-text">{{ $dish->description }}</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
    </div>
</div> --}}

<div class="container text-center d-flex justify-content-center">
    <div class="card card-show my-5">
        <img src="https://www.frescadelivery.com/wp-content/uploads/2020/06/Antipasto-misto-for-2-1-scaled-e1619175792723.jpg"
            alt="">
        <div class="card-body">
            <h5 class="card-title">{{ $dish->name }}</h5>
            <p class="card-text">{{ $dish->description }}</p>
            <p><strong>€ {{ $dish->price }}</strong></p>
            <div class="d-flex justify-content-around">
                <a href="{{ route('admin.dishes.index') }}" class="btn btn-outline-success me-2"><i class="fa-sharp fa-solid fa-circle-arrow-left me-1"></i>Torna indietro</a>
                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-outline-warning me-2"><i class="fa-solid fa-pencil"></i>
                    Modifica
                </a>
                <form class="delete-form d-inline"  action="{{route("admin.dishes.destroy", $dish->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i>
                        Elimina
                    </button>
                </form>
                {{-- <a href="" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i>
                    Elimina
                </a> --}}
            </div>
        </div>
    </div>
</div>
  @endsection