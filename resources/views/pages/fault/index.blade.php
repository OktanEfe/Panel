@extends('layouts/contentNavbarLayout')

@section('title', 'Arıza Kayıtları')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4">
    <h2>Arıza Kayıtları</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Makine</th>
                <th>Parça</th>
                <th>Durma Tarihi</th>
                <th>Başlangıç Saati</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Arıza Nedeni</th>
                <th>Arıza Açıklaması</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faults as $fault)
            <tr>
                <td>{{ $fault->machine->machine_name}}</td>
                <td>{{ $fault->part->name}}</td>
                <td>{{ $fault->stop_time }}</td>
                <td>{{ $fault->start_time }}</td>
                <td>{{ $fault->user->name }}</td>
                <td>{{ $fault->user->surname }}</td>
                <td>{{ $fault->cause_of_malfunction }}</td>
                <td>{{ $fault->Description }}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('fault.edit', $fault->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Delete Form -->
                    <form action="{{ route('fault.destroy', $fault->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu kaydı silmek istediğinize emin misiniz?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
