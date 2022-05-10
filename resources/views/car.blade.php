<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index_shw.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="icon" href="{{ asset('images/L.png') }}">
    <title>MCar.</title>

    <style>
        .desc{
            width: 85%;
            margin: auto;
            margin-top: 5%;
            font-size: 20px;
        }
        .desc h1{
            border-left: 5px solid #ff0;
            padding-left: 1%;
        }
    </style>
</head>
<body>
    <div class="contener">
        <div class="phot">
            <div class="logo">
                <h1>MRcar</h1>
                <div class="point"></div>
            </div>
            <img src="{{ asset('images/1-54.jpg') }}" alt="">
        </div>
        <div class="lfet">
            <p class="p">
            {{ $car_data['mark'] }}  {{ $car_data['model'] }} - {{ $car_data['year'] }}
            </p>
            <div class="fet">
                <div>
                    <p>Mark:</p>
                    <p>{{ $car_data['mark'] }}</p>
                </div>
                <div>
                    <p>Model:</p>
                    <p>{{ $car_data['model'] }}</p>
                </div>
                <div>
                    <p>Color:</p>
                    <p>{{ $car_data['color'] }}</p>
                </div>
                <div>
                    <p>Year:</p>
                    <p>{{ $car_data['year'] }}</p>
                </div>
                <div>
                    <p>Tirm:</p>
                    <p>{{ $car_data['tirm'] }}</p>
                </div>
                <div>
                    <p>interior:</p>
                    <p>{{ $car_data['interior'] }}</p>
                </div>
                <div>
                    <p>Body:</p>
                    <p>{{ $car_data['body'] }}</p>
                </div>
                <div>
                    <p>PhoneNumber:</p>
                    <p>{{ $phone }}</p>
                </div>
                <div>
                    <p>Transmission:</p>
                    <p>{{ $car_data['transmission'] }}</p>
                </div>
                </div>
            <button class="bn">{{ $car_data['price'] }} EL</button>
        </div>
    </div>
    <div class="desc">
        <h1>Car Description</h1>
        <p>{{ $car_data['desc'] }}</p>
    </div>
</body>
</html>