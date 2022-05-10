@extends('seller.layouts.main')

@section('style')
    <style>
        textarea {
            width: 100%;
            resize: none;
            border-radius: 5px;
            padding: 1%;
        }

        input {
            width: 90%;
            padding: 1%;
            border-radius: 5px;
            border-color: rgb(131, 131, 131);
            border-width: 0.5px;
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

    <form action="{{ route('car.submit.update', ['id' => $car->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                                            <td>
                                                <input type="text" name="mark" value="{{ $car->mark }}">
                                                @error('mark')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Model</th>
                                            <td><input type="text" name="model" value="{{ $car->model }}">
                                                @error('model')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Year</th>
                                            <td><input type="text" name="year" value="{{ $car->year }}">
                                                @error('year')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Body</th>
                                            <td><input type="text" name="body" value="{{ $car->body }}">
                                                @error('body')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Color</th>
                                            <td><input type="text" name="color" value="{{ $car->color }}">
                                                @error('color')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tirm</th>
                                            <td><input type="text" name="tirm" value="{{ $car->tirm }}">
                                                @error('tirm')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Interior</th>
                                            <td><input type="text" name="interior" value="{{ $car->interior }}">
                                                @error('interior')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Transmission</th>
                                            <td><input type="text" name="transmission" value="{{ $car->transmission }}">
                                                @error('transmission')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Price</th>
                                            <td><input type="text" name="price" value="{{ $car->price }}"> : EGP
                                                @error('price')
                                                    <p style="color: red">* {{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-5">
                    <img src="{{ asset('uploaded_cars/' . $car->img) }}" alt="car" id="car">
                    <div class="mt-3">
                        <input type="file" hidden id="img-inp" name="car_img">
                        @error('car_img')
                            <p style="color: red">* {{ $message }}</p>
                        @enderror
                        <button type="button" id="img-btn" class="btn btn-warning">Upload Image</button>
                    </div>
                    <div class="mt-5">
                        <h2 class="mb-2" style="border-left: 5px solid black; padding-left: 2%">Car Description
                        </h2>
                        <textarea rows="8" name="desc">{{ $car->desc }}</textarea>
                        @error('desc')
                            <p style="color: red">* {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mt-5 mb-5">
                    <button type="submit" class="w-25 btn btn-primary">Update</button>
                    <button type="button" class="w-25 btn btn-danger" id="cancel">Cancel</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $('#img-btn').click(function() {
            $('#img-inp').trigger('click');
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#car').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img-inp").change(function() {
            readURL(this);
        });

        $('#cancel').click(function(){
            window.location.replace('/seller/cars');
        });
    </script>
@endsection
