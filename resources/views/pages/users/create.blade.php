@extends('layouts/contentNavbarLayout')

@section('title', 'Add User')


@section('content')
  @include('layouts/sections/menu/verticalMenu')
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Add User</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
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
        <form action="{{ route('users.store') }}" method="POST">
          @csrf
          <div class="form-password-toggle">
            <label class="form-label" for="name">Name</label>
            <div class="input-group input-group-merge">
              <input type="text" class="form-control" id="name" name="name" required />
            </div>
          </div>

          <div class="form-password-toggle">
            <label class="form-label" for="surname">Surname</label>
            <div class="input-group input-group-merge">
              <input type="text" class="form-control" id="surname" name="surname" required />
            </div>
          </div>
          <div class="form-password-toggle">
            <label class="form-label" for="surname">Phone Number</label>
            <div class="input-group input-group-merge">
              <input type="text" class="form-control" id="surname" name="surname" required /> // daha kayıtlı değil veritabanına 
            </div>
          </div>

          <div class="form-password-toggle">
            <label class="form-label" for="email">Email</label>
            <div class="input-group input-group-merge">
              <input type="email" class="form-control" id="email" name="email" required />
            </div>
          </div>

          <div class="form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" class="form-control" id="password" name="password" required placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="role">Role</label>
            <select class="form-select" id="role" name="role" required>
              <option value="" selected>Choose...</option>
              @foreach($roles as $key => $role)
                <option value="{{ $key }}">{{ $role }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary mt-3">Add</button>
        </form>
      </div>
    </div>
  </div>
@endsection
