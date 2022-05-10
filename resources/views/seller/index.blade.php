@extends('seller.layouts.main')

@section('content')
    <div class="col-xl-4 col-lg-6">
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
                        <h2 class="text-white display-6" id="h-name">{{ Auth::guard('seller')->user()->name }}</h2>
                        <p class="text-light">{{ Auth::guard('seller')->user()->phone }}</p>

                        <p class="mb-0 text-light">{{ Auth::guard('seller')->user()->email }}</p>
                    </div>
                </div>
            </div>
        </section>
        <button class="btn btn-danger"><a style="color: white" href="{{ route('seller.delete') }}">Delete My Account</a></button>
    </div>

    <div class="col-xl-8 col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Change</strong> Your Name
            </div>
            <div class="card-body card-block">
                <form id="name-form" action="{{ route('seller.update') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class=" form-control-label">Name</label>
                        <input type="text" name="name" placeholder="Enter Name..." class="form-control">
                        @error('name')
                            <p style="color: red">* {{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button id="submit-name" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </div>

        @if (session('success'))
        <div>
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success mr-2">Success</span><span id="success">{{ session('success') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        
        @if (session('error'))
        <div>
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-danger mr-2">Error</span><span id="error">{{ session('error') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <strong>Change</strong> Your Phone
            </div>
            <div class="card-body card-block">
                <form id="phone-form" action="{{ route('seller.update') }}" method="post" class="">
                    @csrf
                    <div class="form-group"><label for="phone" class=" form-control-label">Phone</label><input
                            type="text" id="phone" name="phone" placeholder="Enter Phone..." class="form-control">
                        @error('phone')
                            <p style="color: red">* {{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button id="submit-phone" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <strong>Change</strong> Your Password
            </div>
            <div class="card-body card-block">
                <form id="password-form" action="{{ route('seller.update') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="password" class=" form-control-label">Old Password</label>
                        <input type="password" id="password" name="old_password" placeholder="Enter Password..."
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="new_password" class=" form-control-label">New
                            Password</label>
                        <input type="password" id="new_password" name="new_password" placeholder="Enter Password..."
                            class="form-control">
                        @error('new_password')
                            <p style="color: red">* {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group"><label for="confirm_new_password" class=" form-control-label">Confirm New
                            Password</label><input type="password" id="confirm_new_password" name="confirm_new_password"
                            placeholder="Enter Password..." class="form-control">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button id="submit-password" type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#submit-name").click(function() {
            $("#name-form").submit();
        });
        $("#submit-password").click(function() {
            $("#password-form").submit();
        });
        $("#submit-phone").click(function() {
            $("#phone-form").submit();
        });
    </script>
@endsection
