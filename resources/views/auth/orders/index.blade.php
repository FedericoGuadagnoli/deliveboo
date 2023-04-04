@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-around nt-3">
            @foreach ($orders as $order)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3 py-3">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">{{$order->first_name}}</h5>
                          <h5 class="card-title">{{$order->last_name}}</h5>
                          <p class="card-text">{{$order->email}}</p>
                          <p class="card-text">{{$order->phone}}</p>
                          <p class="card-text">{{$order->address}}</p>
                          <p class="card-text">€ {{$order->total_price}}</p>
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="payment_status" name="payment_status"
                                @if (old('payment_status', $order->payment_status)) checked @endif>
                            <label class="form-check-label" for="payment_status">Pagato</label>
                        </div>
                          <a href="#" class="btn btn-outline-primary mt-1"><i
                            class="fa-solid fa-eye"></i>
                        Mostra
                    </a>
                          {{-- <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-primary"><i
                            class="fa-solid fa-eye"></i>
                        Mostra
                    </a> --}}
                        </div>
                      </div>

                </div> 
            @endforeach
            
        </div>
    </div>
@endsection
