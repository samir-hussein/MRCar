@extends('admin.layouts.main')

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
                        <h2 class="text-white display-6" id="h-name">{{ $car->seller->name }}</h2>
                        <p class="text-light">{{ $car->seller->phone }}</p>

                        <p class="mb-0 text-light">{{ $car->seller->email }}</p>
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

    <div class="col-12">
        <div class="row">
            <div class="col-7">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Car Info</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Mark</th>
                                        <td>{{ $car->mark }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Model</th>
                                        <td>{{ $car->model }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Year</th>
                                        <td>{{ $car->year }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Body</th>
                                        <td>{{ $car->body }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Color</th>
                                        <td>{{ $car->color }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tirm</th>
                                        <td>{{ $car->tirm }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Interior</th>
                                        <td>{{ $car->interior }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Transmission</th>
                                        <td>{{ $car->transmission }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <td>{{ $car->price }} EGP</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-5">
                <img src="{{ asset('uploaded_cars/' . $car->img) }}" alt="car">
                <div class="mt-5">
                    <h2 class="mb-2" style="border-left: 5px solid black; padding-left: 2%">Car Description</h2>
                    <p style="font-size: 19px">{{ $car->desc }}</p>
                </div>
            </div>
            <div class="col-12 mt-5 mb-5">
                <button type="button" data-id="{{ $car->id }}" class="w-25 btn btn-danger" id="del-btn">Delete</button>
                @if ($car->approved == 'no')
                    <a href="{{ route('car.approve', ['id' => $car->id]) }}"
                        class="w-25 btn btn-success">Approve</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#del-btn').click(function(){
            let id = $(this).attr('data-id');
            $.ajax({
                url: '/admin/car/' + id + "/delete",
                method: 'get',
                success: function(){
                    window.location.replace(document.referrer + "?msg='del'");
                }
            });
        });
    </script>
@endsection
