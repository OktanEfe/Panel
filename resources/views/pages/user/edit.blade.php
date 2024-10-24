@extends('layouts/contentNavbarLayout')

@section('title', 'Edit User')

@section('content')
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">Edit User</h5>
      <div class="card-body demo-vertical-spacing demo-only-element">
        <form>
          <!-- Name Field -->
          <div class="form-password-toggle">
            <label class="form-label" for="name">Name</label>
            <div class="input-group input-group-merge">
              <input type="text" class="form-control" id="name" name="name" value="John" />
            </div>
          </div>

          <!-- Surname Field -->
          <div class="form-password-toggle">
            <label class="form-label" for="surname">Surname</label>
            <div class="input-group input-group-merge">
              <input type="text" class="form-control" id="surname" name="surname" value="Doe" />
            </div>
          </div>

          <!-- Email Field -->
          <div class="form-password-toggle">
            <label class="form-label" for="email">Email</label>
            <div class="input-group input-group-merge">
              <input type="email" class="form-control" id="email" name="email" value="johndoe@example.com" />
            </div>
          </div>

          <!-- Password Field -->
          <div class="form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" class="form-control" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
            </div>
            <small class="form-text text-muted">Leave blank if you don't want to change the password</small>
          </div>

          <!-- Role Selection -->
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-body demo-vertical-spacing demo-only-element">
                  <div class="input-group">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-select" id="role" name="role">
                      <option selected>Choose...</option>
                      <option value="1">Staff1</option>
                      <option value="2">Staff2</option>
                      <option value="3">Staff3</option>
                    </select>
                  </div>

                  <!-- Update Button (Just for display) -->
                  <div class="input-group">
                    <button class="btn btn-outline-primary" type="button">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
