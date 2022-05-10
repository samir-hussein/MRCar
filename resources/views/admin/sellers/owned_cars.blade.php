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
    <div class="col-12">
        <section class="card">
            <div class="twt-feed blue-bg">
                <div class="corner-ribon black-ribon">

                </div>
                <div class="fa fa-twitter wtt-mark"></div>

                <div class="media">
                    <a href="">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt=""
                            src="{{ asset('dashboard/images/admin.jpg') }}">
                    </a>
                    <div class="media-body">
                        <h2 class="text-white display-6" id="h-name">{{ $seller->name }}</h2>
                        <p class="text-light">{{ $seller->phone }}</p>

                        <p class="mb-0 text-light">{{ $seller->email }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

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

    @if (isset($_GET['msg']))
        <div class="col-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success mr-2">Success</span> <span>Car has been deleted successfully.</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="col-12">
        <div class="row">
            @foreach ($seller->cars as $car)
                @php
                    if($car->approved == 'no'){
                        $href = route('admin.car.info', ['id' => $car->id]);
                    }else {
                        $href = route('car', ['id' => $car->id]);
                    }
                @endphp
                <div class="col-4">
                    <div class="card" style="width: 22rem;">
                        <img src="{{ asset('uploaded_cars/' . $car->img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->mark }} {{ $car->model }} {{ $car->body }}
                                {{ $car->year }} {{ $car->color }}</h5>
                            <p class="card-text">{{ $car->price }} EGP</p>
                            <a href="{{ $href }}" class="btn-size btn btn-warning">read
                                more</a>
                            <a href="{{ route('admin.car.delete', ['id' => $car->id]) }}" class="btn-size btn btn-danger">Delete</a>
                            @if ($car->approved == 'no')
                                <a href="{{ route('car.approve', ['id' => $car->id]) }}"
                                    class="mt-2 w-100 btn btn-success">Approve</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
