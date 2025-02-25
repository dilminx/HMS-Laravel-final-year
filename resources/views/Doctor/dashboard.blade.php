@extends('layout.doctor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><i class="fas fa-tachometer-alt"></i> Doctor Dashboard</h2>

            <!-- Show Success/Error Notifications -->
            <script>
                $(document).ready(function() {
                    @if(session('success'))
                        toastr.success("{{ session('success') }}");
                    @endif
            
                    @if(session('error'))
                        toastr.error("{{ session('error') }}");
                    @endif
                });
            </script>
            

            <div class="card">
                <div class="card-header">Doctor Profile</div>
                <div class="card-body">
                    <form action="{{ route('doctor.update', $mainData->idmaster_user) }}" method="POST">
                        @csrf
                        <!-- First Name -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-user"></i> First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{ $mainData->first_name }}" required>
    </div>

    <!-- Last Name -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-user"></i> Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{ $mainData->last_name }}" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
        <input type="email" name="email" class="form-control" value="{{ $mainData->email }}" required>
    </div>

    <!-- Specialization -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-stethoscope"></i> Specialization</label>
        <input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}" required>
    </div>

    <!-- Hospital -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-hospital"></i> Hospital</label>
        <input type="text" name="work_hospital" class="form-control" value="{{ $doctor->work_hospital }}" required>
    </div>
 
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header"><i class="fas fa-comments"></i> Doctor Reviews</div>
                <div class="card-body">
                    @forelse($reviews as $review)
                        <div class="border p-2 mb-2">
                            <strong><i class="fas fa-user"></i> Patient {{ $review->patients_idpatients }}</strong>
                            <p><i class="fas fa-comment"></i> {{ $review->feedback }}</p>
                        </div>
                    @empty
                        <p>No reviews yet.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
