@extends('layouts/contentNavbarLayout')

@section('title', 'Edit User')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h5>Edit User - {{ $users->name }}</h5>
          </div>
          <div class="card-body">
            <!-- Display success or error messages -->
            @if (session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <!-- Edit Form -->
            <form action="{{ route('user.update', $users->id) }}" method="POST">
              @csrf
              @method('PUT')

              <!-- Name Field -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $users->name) }}">
              </div>

              <!-- Surname Field -->
              <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $users->surname) }}">
              </div>

              <!-- Email Field -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $users->email) }}">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $users->phone_number) }}">
              </div>

              <!-- Password Field -->
              {{-- <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep current password">
              </div> --}}
              <div class="form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" class="form-control" id="password" name="password" required placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                </div>
              </div>

              <!-- Role Field -->
              <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select">
                  {{-- <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Staff1</option>
                  <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Staff2</option>
                  <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Staff3</option> --}}
                </select>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary">Update User</button>
              <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
