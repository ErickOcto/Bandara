@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <div class="card" style="width: 40rem; margin-top: 50px;">
        <img src="{{ asset('/storage/speedtest/'.$speedtest->image) }}" class="card-img-top" alt="image">
        <div class="card-body">
            <h2 class="card-title font-extrabold">
                {{$speedtest->name}}</h2>
            <p class="card-text">
                {{ $speedtest->created_at }} <br>
                Oleh :
                {{ $speedtest->user_name }} <br>
                Deskripsi : <br>
                {{$speedtest->description}}
            </p>
        </div>
    </div>
</div>

@endsection
