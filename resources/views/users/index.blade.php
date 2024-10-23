@extends('layouts/contentNavbarLayout')

@section('title', 'Users Index')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        <!-- Form for GET request -->
        <form action="{{ route('users.index') }}" method="GET" class="mb-3">
          <div class="form-group">
            <label for="search">Search users:</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="Enter user name">
          </div>
          <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>

        <div class="card">
          <h5 class="card-header">Users Table</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
              <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody class="table-border-bottom-0">
              @foreach($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->surname }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                      <span class="badge rounded-pill bg-label-{{ $user->role == 1 ? 'primary' : ($user->role == 2 ? 'success' : 'info') }}">
                        {{ $user->role == 1 ? 'Staff1' : ($user->role == 2 ? 'Staff2' : 'Staff3') }}
                      </span>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                      <div class="dropdown-menu">
                        <button class="dropdown-item" onclick="editUser({{ $user }})" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="mdi mdi-pencil-outline me-1"></i> Edit</button>
                        <button class="dropdown-item" onclick="deleteUser({{ $user->id }})"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit User Modal -->
  <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editUserForm" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="editName">Name:</label>
              <input type="text" class="form-control" id="editName" name="name" required>
            </div>
            <div class="form-group">
              <label for="editSurname">Surname:</label>
              <input type="text" class="form-control" id="editSurname" name="surname" required>
            </div>
            <div class="form-group">
              <label for="editEmail">Email:</label>
              <input type="email" class="form-control" id="editEmail" name="email" required>
            </div>
            <div class="form-group">
              <label for="editPassword">Password:</label>
              <input type="password" class="form-control" id="editPassword" name="password" placeholder="Leave blank to keep current password">
            </div>
            <div class="form-group">
              <label for="editRole">Role:</label>
              <select class="form-control" id="editRole" name="role" required>
                <option value="1">Staff1</option>
                <option value="2">Staff2</option>
                <option value="3">Staff3</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function editUser(user) {
      const form = document.getElementById('editUserForm');
      form.action = `/users/${user.id}`;
      document.getElementById('editName').value = user.name;
      document.getElementById('editSurname').value = user.surname;
      document.getElementById('editEmail').value = user.email;
      document.getElementById('editRole').value = user.role;
    }

    function deleteUser(userId) {
      if (confirm('Are you sure you want to delete this user?')) {
        const form = document.createElement('form');
        form.action = `/users/${userId}`;
        form.method = 'POST';
        form.innerHTML = `
          @csrf
        @method('DELETE')
        `;
        document.body.appendChild(form);
        form.submit();
      }
    }
  </script>
@endsection
