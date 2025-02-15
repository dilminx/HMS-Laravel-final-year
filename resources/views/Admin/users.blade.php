@extends('layout.admin')

@section('content')
<div class="container">
    <h2>Manage Users</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->user_role_iduser_role == 2) Patient 
                    @elseif($user->user_role_iduser_role == 3) Doctor 
                    @elseif($user->user_role_iduser_role == 4) Lab Assistant 
                    @endif
                </td>
                <td>
                    <span class="badge {{ $user->status ? 'bg-success' : 'bg-danger' }}">
                        {{ $user->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('admin.toggleStatus', ['id' => $user->idmaster_user]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">
                            {{ $user->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
