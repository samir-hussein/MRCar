<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="icon" href="{{ asset('images/L.png') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <title> Sell Car </title>

    <style>
        .res-msg{
            background-color: #28a745;
            padding: 0.1%;
            color: white;
            width: 30%;
            margin: auto;
            text-align: center;
            font-size: 18px;
            text-transform: capitalize
        }
    </style>
</head>

<body>
    <div class="logo">
        <h1>MRcar</h1>
        <div class="point"></div>
    </div>
    @if (session('success'))
    <div class="res-msg">
        <p>success | {{ session('success') }}</p>
    </div>
    @endif
    <h3>Image :</h3>
    <div class="contener">
        
        <div class="left">
            <div>
                <img src="" alt="car" id="car" style="width:100%;height:100%;visibility:hidden">
            </div>
            @error('car_img')
                <p style="color: red">* {{ $message }}</p>
            @enderror
            <div class="dec">
                <textarea style="height: 100%" id="desc" class="dec" placeholder="Descripe you car..." required></textarea>
            </div>
            @error('desc')
                <p style="color: red">* {{ $message }}</p>
            @enderror
        </div>
        <form class="right" enctype="multipart/form-data" action="{{ route('car.store') }}" method="post">
            @csrf
            <h4>Sell you Car</h4>
            <div class="sel">
                <input type="text" name="mark" placeholder="Mark" autocomplete="off" class="se">
                @error('mark')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" name="model" placeholder="Model" autocomplete="off" class="se">
                @error('model')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" name="color" placeholder="Color" autocomplete="off" class="se">
                @error('color')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" name="year" placeholder="Year" autocomplete="off" class="se">
                @error('year')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" name="tirm" placeholder="Tirm" autocomplete="off" class="se">
                @error('tirm')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" name="interior" placeholder="interior" autocomplete="off" class="se">
                @error('interior')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" name="body" placeholder="Body" autocomplete="off" class="se">
                @error('body')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" name="price" placeholder="Price" autocomplete="off" class="se">
                @error('price')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" name="transmission" placeholder="Transmission" autocomplete="off"
                    class="se">
                @error('transmission')
                    <p style="color: red">* {{ $message }}</p>
                @enderror
                <input type="text" id="descInp" name="desc" hidden>
            </div>
            <div class="button">
                <input type="file" id="imgInp" name="car_img" hidden>
                <button type="button" id="imgbtn">load image </button>
                <button type="submit" id="submit">register</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#car').css('visibility', 'visible');
                    $('#car').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

        $("#imgbtn").click(function() {
            $("#imgInp").trigger('click');
        });

        $("#submit").click(function(e) {
            $("#descInp").val($('#desc').val());
        });
    </script>
</body>

</html>
