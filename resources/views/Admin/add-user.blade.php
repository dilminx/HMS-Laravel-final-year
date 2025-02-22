@extends('layout.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Add New User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.addUser') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile Number</label>
                <input type="text" name="mobile_number" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Role</label>
                <select name="role" id="roleSelect" class="form-control form-control-sm" required>
                    <option value="2">Patient</option>
                    <option value="3">Doctor</option>
                    <option value="4">Lab Assistant</option>
                </select>
            </div>

            <!-- Doctor Category (Only for Doctors) -->
            <div class="col-md-6" id="doctorCategoryDiv" style="display: none;">
                <label class="form-label">Doctor Category</label>
                <select name="doctor_category" class="form-control form-control-sm">
                    <option value="">-- Select Category --</option>
                    @foreach($doctorCategories as $category)
                        <option value="{{ $category->iddoctor_category }}">
                            {{ $category->category_doctor }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary btn-sm">Add User</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('roleSelect').addEventListener('change', function () {
        document.getElementById('doctorCategoryDiv').style.display = (this.value == '3') ? 'block' : 'none';
    });
</script>

@endsection
