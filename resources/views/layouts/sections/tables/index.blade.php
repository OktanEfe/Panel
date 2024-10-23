@php
  $isMenu = false;
  $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Without menu - Layouts')
asdasd
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Tables Index</h1>
        <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Create New Table</a>
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        <!-- Form for GET request -->
        <form action="{{ route('tables.index') }}" method="GET" class="mb-3">
          <div class="form-group">
            <label for="search">Search Tables:</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="Enter table name">
          </div>
          <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>

        <table class="table table-bordered">
          <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($tables as $table)
            <tr>
              <td>{{ $table->id }}</td>
              <td>{{ $table->name }}</td>
              <td>
                <a href="{{ route('tables.show', $table->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tables.destroy', $table->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
