@extends('admin.layouts.main')

@section('style')
    <style>
        .btn-size {
            width: 49%;
        }

        .card-img-top{
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="col-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success mr-2">Success</span> <span>{{ session('success') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="col-12">
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-4">
                    <div class="card" style="width: 22rem;">
                        <img src="{{ asset('uploaded_cars/' . $car->img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->mark }} {{ $car->model }} {{ $car->body }}
                                {{ $car->year }} {{ $car->color }}</h5>
                            <p class="card-text">Seller name : {{ $car->seller->name }}</p>
                            <p class="card-text">Seller phone :{{ $car->seller->phone }}</p>
                            <p class="card-text">Seller email : {{ $car->seller->email }}</p>
                            <p class="card-text">{{ $car->price }} EGP</p>
                            <a href="{{ route('car', ['id' => $car->id]) }}" class="btn-size btn btn-warning">read more</a>
                            <a href="{{ route('admin.car.delete', ['id' => $car->id]) }}" class="btn-size btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
