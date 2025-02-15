@extends('layout.admin')

@section('content')
<div class="container">
    <h2>Admin Profile</h2>
    <form action="{{ route('admin.updateProfile') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ $admin->first_name }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ $admin->last_name }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile_number" value="{{ $admin->mobile_number }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $admin->email }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
    </form>
</div>
@endsection
