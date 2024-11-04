@extends('layouts/contentNavbarLayout')

@section('title', 'Arıza Kaydını Düzenle')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4">
    <h2>Arıza Kaydını Düzenle</h2>

    <form action="{{ route('fault.update', $fault->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Makine Adı -->
        <div class="mb-3">
            <label for="machine_name" class="form-label">Makine Adı</label>
            <input type="text" class="form-control" id="machine_name" name="machine_name" value="{{ $fault->machine->machine_name }}" >
        </div>

        <!-- Parça Adı -->
        <div class="mb-3">
            <label for="part_name" class="form-label">Parça Adı</label>
            <input type="text" class="form-control" id="part_name" name="part_name" value="{{ $fault->part->name }}" >
        </div>

        <!-- Durma Tarihi -->
        <div class="mb-3">
            <label for="date_time" class="form-label">Durma Tarihi</label>
            <input type="datetime-local" class="form-control" id="date_time" name="stop_time" value="{{ $fault->stop_time }}" required>
        </div>

        <!-- Başlangıç Saati -->
        <div class="mb-3">
            <label for="start_time" class="form-label">Başlangıç Saati</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ $fault->start_time }}" required>
        </div>

        <!-- Kullanıcı Adı -->
        <div class="mb-3">
            <label for="user_name" class="form-label">Ad</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $fault->user->name }}" readonly>
        </div>

        <!-- Kullanıcı Soyadı -->
        <div class="mb-3">
            <label for="user_surname" class="form-label">Soyad</label>
            <input type="text" class="form-control" id="user_surname" name="user_surname" value="{{ $fault->user->surname }}" readonly>
        </div>

        <!-- Arıza Nedeni -->
        <div class="mb-3">
            <label for="cause_of_malfunction" class="form-label">Arıza Nedeni</label>
            <input type="text" class="form-control" id="cause_of_malfunction" name="cause_of_malfunction" value="{{ $fault->cause_of_malfunction }}" >
        </div>

        <!-- Arıza Açıklaması -->
        <div class="mb-3">
            <label for="fault_description" class="form-label">Arıza Açıklaması</label>
            <textarea class="form-control" id="fault_description" name="description" rows="3" required>{{ $fault->Description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
</div>

@endsection
