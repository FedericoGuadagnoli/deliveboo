@extends('layouts.app')

@section('content')
    @foreach ($dishes as $dish)
        <ul>
            <li>
                <h1>{{ $dish->name }}</h1>
            </li>
        </ul>
    @endforeach
@endsection
