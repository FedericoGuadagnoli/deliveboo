@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($dishes as $dish)
            <div class="row d-flex dashboard justify-content-around">
                <div class="col-4">
                    <div class="card">
                        <img src="https://www.frescadelivery.com/wp-content/uploads/2020/06/Antipasto-misto-for-2-1-scaled-e1619175792723.jpg"
                            alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p><strong>€ {{ $dish->price }}</strong></p>
                            <div class="d-flex justify-content-around">
                                <a href="" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i>
                                    Osserva
                                </a>
                                <a href="" class="btn btn-outline-success"><i class="fa-solid fa-pencil"></i>
                                    Modifica
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
