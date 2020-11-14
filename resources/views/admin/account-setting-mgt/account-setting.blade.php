@extends('admin.layouts.app')

@section('content')
<<<<<<< HEAD
=======
@if(Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif


@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</div>
@endif
>>>>>>> 0b128b14cb19db4db1ed20867853def8441a2c49
<div class="page-title">
    <h5>Update Password</h5>
</div>

<div class="password-form row">
    <div class="col-md-6">
<<<<<<< HEAD
        <form action="">
            <div class="form-group">
                <label for="">Current Password</label>
                <input class="form-control" type="text" />
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input class="form-control" type="text" />
            </div>
            <div class="form-group">
                <label for="">Confirm New Password</label>
                <input class="form-control" type="text" />
            </div>
            <div class="mt-4">
                <button class="main-btn blue-btn btn">Change Password</button>
=======
        <form action="{{ route('password-reset') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="">New Password</label>
                <input class="form-control" name="password" type="text" required />
            </div>
            <div class="form-group">
                <label for="">Confirm New Password</label>
                <input class="form-control" name="password_confirmation" type="text" required />
            </div>
            <div class="mt-4">
                <button type="submit" class="main-btn blue-btn btn">Change Password</button>
>>>>>>> 0b128b14cb19db4db1ed20867853def8441a2c49
            </div>
        </form>
    </div>
</div>
@endsection
