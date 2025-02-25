@extends('layout.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Doctors List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Doctor Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->idmaster_user }}</td>
                <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->mobile_number }}</td>
                
                <td>
                    @if($doctor->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('admin.toggleStatus', $doctor->idmaster_user) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm {{ $doctor->status ? 'btn-danger' : 'btn-success' }}">
                            {{ $doctor->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
