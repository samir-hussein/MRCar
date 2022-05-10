@extends('admin.layouts.main')

@section('content')
    <div class="w-75 m-auto">
        <div class="alert  alert-success alert-dismissible fade show d-none" role="alert">
            <span class="badge badge-pill badge-success mr-2">Success</span><span id="success"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="card w-75 m-auto">
        <div class="card-header">
            <strong>Create</strong> New Admin
        </div>
        <div class="card-body card-block">
            <form id="create-user" action="{{ route('admin.submit.register') }}" method="post">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter Name..." class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <label style="color: red">* {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email..." class="form-control" value="{{ old('email') }}">
                    @error('email')
                    <label style="color: red">* {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Password</label>
                    <input type="password" name="password" placeholder="Enter Password..." class="form-control">
                    @error('password')
                    <label style="color: red">* {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Enter Confirm Password..." class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="owner">Owner</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <label style="color: red" class="d-none role-error">* <span id="role-error"></span></label>
            </form>
        </div>
        <div class="card-footer">
            <div uk-spinner class="d-none" id="spinner"></div>

            <button id="submit" type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Create
            </button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#submit").click(function() {
            $("#create-user").submit();
        })
    </script>
@endsection
