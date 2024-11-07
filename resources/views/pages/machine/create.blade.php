@extends('layouts/contentNavbarLayout')

@section('title', 'Makine Arıza Kaydı Oluştur')
@section('content')
<div class="container">
    <h1>Makine Oluştur</h1>

    <!-- Makine Oluşturma Formu -->
    <form action="{{ route('machine.store') }}" method="POST">
        @csrf

        <!-- Makinenin İsmi -->
        <div class="form-group">
            <label for="machineName">Makine İsmi</label>
            <input type="text" name="machine_name" id="machineName" class="form-control" placeholder="Makine adını girin" required>
        </div>

        <!-- Parça Sayısı Girdisi -->
        <div class="form-group">
            <label for="parts_count">Parça Sayısı</label>
            <input type="number" name="parts_count" id="parts_count" class="form-control" placeholder="Kaç parça gireceksiniz?" min="1" required>
        </div>

        <!-- Parça Alanları (Dinamik) -->
        <div id="partsContainer" class="row"></div>

        <!-- Form Gönderme Butonu -->
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    </form>
</div>

<!-- Javascript ile Dinamik Parça Alanları Oluşturma -->
<script>
    document.getElementById('parts_count').addEventListener('change', function () {
        var partCount = parseInt(this.value);
        var partsContainer = document.getElementById('partsContainer');

        // Önceki alanları temizle
        partsContainer.innerHTML = '';

        // Girilen parça sayısına göre yeni alanlar oluştur
        for (var i = 0; i < partCount; i++) {
            var newPart = document.createElement('div');
            newPart.classList.add('form-group', 'part-item', 'col-4', 'my-4');
            newPart.innerHTML = `
                <label for="partName_${i}">Parça İsmi</label>
                <input type="text" name="name[]" class="form-control" placeholder="Parça ismini girin" required>

                <label for="partExpiry_${i}">Son Kullanma Tarihi (SKT)</label>
                <input type="date" name="expiry_date[]" class="form-control" required>
            `;
            partsContainer.appendChild(newPart);
        }
    });
</script>
@endsection
