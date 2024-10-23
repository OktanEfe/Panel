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

        <!-- Parça Alanları (Dinamik) -->
        <div id="partsContainer">
            <div class="form-group part-item">
                <label for="partName">Parça İsmi</label>
                <input type="text" name="part_names[]" class="form-control" placeholder="Parça ismini girin" required>

                <label for="partExpiry">Son Kullanma Tarihi (SKT)</label>
                <input type="date" name="part_expiries[]" class="form-control" required>
            </div>
        </div>

        <!-- Yeni Parça Ekle Butonu -->
        <button type="button" class="btn btn-secondary" id="addPartBtn">Parça Ekle</button>

        <!-- Form Gönderme Butonu -->
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    </form>
</div>

<!-- Javascript ile Dinamik Parça Ekleme -->
<script>
    document.getElementById('addPartBtn').addEventListener('click', function () {
        // Yeni parça form alanını oluştur
        var newPart = document.createElement('div');
        newPart.classList.add('form-group', 'part-item');
        newPart.innerHTML = `
            <label for="partName">Parça İsmi</label>
            <input type="text" name="part_names[]" class="form-control" placeholder="Parça ismini girin" required>

            <label for="partExpiry">Son Kullanma Tarihi (SKT)</label>
            <input type="date" name="part_expiries[]" class="form-control" required>
        `;

        // Yeni parça formunu mevcut container'a ekle
        document.getElementById('partsContainer').appendChild(newPart);
    });
</script>
@endsection
