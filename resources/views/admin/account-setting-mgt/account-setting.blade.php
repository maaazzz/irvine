@extends('admin.layouts.app')

@section('content')
<div class="page-title">
    <h5>Update Password</h5>
</div>

<div class="password-form row">
    <div class="col-md-6">
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
            </div>
        </form>
    </div>
</div>
@endsection
