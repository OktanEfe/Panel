@extends('layouts/contentNavbarLayout')

@section('title', 'Makine Arıza Kaydı Oluştur')

@section('content')

  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@elseif(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif

    <div class="container mt-4">
        <h2>Makine Arıza Kaydı Oluştur</h2>

        <!-- Form -->
        <form action="{{ route('fault.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="machine" class="form-label">Makine Seçin</label>
                <select class="form-select" id="machine" name="machine" required>
                    <option value="" disabled selected>Makine seçin</option>
                    <option value="Makine 1">Makine 1</option>
                    <option value="Makine 2">Makine 2</option>
                    <option value="Makine 3">Makine 3</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="part" class="form-label">Parça Seçin</label>
                <select class="form-select" id="part" name="part" required>
                    <option value="" disabled selected>Parça seçin</option>
                    <option value="Parça 1">Parça 1</option>
                    <option value="Parça 2">Parça 2</option>
                    <option value="Parça 3">Parça 3</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="date_time" class="form-label">Tarih ve Saat</label>
                <input type="datetime-local" class="form-control" id="date_time" name="date_time" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Ad</label>
                <input type="text" class="form-control" id="name" name="first_name" placeholder="Adınızı girin" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Soyad</label>
                <input type="text" class="form-control" id="surname" name="last_name" placeholder="Soyadınızı girin" required>
            </div>

            <div class="mb-3">
              <label for="fault_reason" class="form-label">Arıza nedeni</label>
              <select class="form-select" id="fault_reason" name="fault_reason"  placeholder="Arıza nedenini seçiniz"  required>
                <option value="" disabled selected>Arıza seçin</option>
                <option value="Arıza1">Arıza1</option>
                <option value="Arıza2">Arıza2</option>
                <option value="Arıza3">Arıza3</option>
          </div>

            <div class="mb-3">
                <label for="fault_description" class="form-label">Arıza Açıklaması</label>
                <textarea class="form-control" id="fault_description" name="fault_description" rows="3" placeholder="Arızayı açıklayın" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kaydı Oluştur</button>
        </form>
    </div>

@endsection
