@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card my-5">
            <div class="row g-0">
                <div class="col">
                    <div class="card-body">
                        <div class="row row-cols-3 text-center">
                            <h5>Ordine n. {{ $order->id }}</h5>
                            <h5>Cliente: {{ $order->first_name }} {{ $order->last_name }}</h5>
                            <div class="col">
                                <h6 class="text-center">Status Pagamento</h6>
                                <p class="text-center">{!! $order->payment_status == 1
                                    ? '<i class="fa-solid fa-check text-success"></i>'
                                    : '<i class="fa-solid fa-xmark text-danger"></i>' !!}
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="row row-cols-md-2">
                            <div class="col">
                                <h6>Piatti</h6>
                            </div>
                            <div class="col">
                                <h6>Prezzo</h6>
                            </div>
                        </div>
                        @foreach ($order->dishes as $dish)
                            <div class="row row-cols-md-2">
                                <div class="col">
                                    {{ $dish->name }}
                                </div>
                                <div class="col">
                                    {{ $dish->price }} €
                                </div>
                            </div>
                        @endforeach


                        <hr>

                        <div class="row row-cols-md-4">
                            <div class="col">
                                <h6>Indirizzo</h6>
                                <p>{{ $order->address }}</p>
                            </div>
                            <div class="col">
                                <h6>E-mail</h6>
                                <p>{{ $order->email }}</p>
                            </div>
                            <div class="col">
                                <h6>Tel.</h6>
                                <p>{{ $order->phone }}</p>
                            </div>
                            <div class="col">
                                <h6>Totale</h6>
                                <p>€ {{ $order->total_price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
