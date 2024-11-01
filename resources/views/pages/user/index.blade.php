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
        <form action="{{ route('user.index') }}" method="GET" class="mb-3">
          <div class="form-group">
            <label for="search">Search users:</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="Enter user name">
          </div>
          <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>

        <div class="card">
          <div class="table-responsive text-nowrap">

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit User Modal -->
  <div class="col-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th class="text-truncate">ID</th>
              <th class="text-truncate">Email</th>
              <th class="text-truncate">Role</th>
              <th class="text-truncate">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">{{$user->name}}</h6>
                    <small class="text-truncate">{{$user->surname}}</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">{{$user->email}}</td>
              <td class="text-truncate"><i class="mdi mdi-laptop mdi-24px text-danger me-1"></i> Admin{{$user->role}}</td>
              <td class="text-truncate">
               <a href="{{ route('user.edit', $user->id) }}" class="mdi mdi-pencil"></a>
               <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class=" btn mdi mdi-delete" onclick="return confirm('Are you sure?')"></button>
            </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Data Tables -->
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
