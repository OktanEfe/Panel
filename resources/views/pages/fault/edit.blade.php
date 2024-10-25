@extends('layouts/contentNavbarLayout')

@section('title', 'Makine Arıza Kaydı Oluştur')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arıza Kaydı Düzenle</title>
</head>
<body>

<div class="container mt-4">
    <h2>Arıza Kaydı Düzenle</h2>

    <!-- Düzenleme Formu -->
    <form id="editForm">
        <div class="mb-3">
            <label for="machine" class="form-label">Makine Seçin</label>
            <select class="form-select" id="machine" name="machine" required>
                <option value="Makine 1">Makine 1</option>
                <option value="Makine 2">Makine 2</option>
                <option value="Makine 3">Makine 3</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="part" class="form-label">Parça Seçin</label>
            <select class="form-select" id="part" name="part" required>
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
            <label for="first_name" class="form-label">Ad</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Soyad</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>

        <div class="mb-3">
                <label for="fault_reason" class="form-label">Arıza Nedeni</label> <!-- seçimli olur bu da bu sayfada bişey daha vardı sanki ama aklıma gelmedi-->
                <textarea class="form-control" id="fault_reason" name="fault_reason" rows="3" placeholder="Arıza nedenini seçin" required></textarea>
            </div>

        <div class="mb-3">
            <label for="fault_description" class="form-label">Arıza Açıklaması</label>
            <textarea class="form-control" id="fault_description" name="fault_description" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kaydı Güncelle</button>
    </form>
</div>

<script>
    // URL parametrelerinden ID'yi al
    const params = new URLSearchParams(window.location.search);
    const faultId = parseInt(params.get('id'));

    // localStorage'dan verileri al
    const storedFaults = JSON.parse(localStorage.getItem('faults'));

    // Düzenlenecek kaydı bul
    const fault = storedFaults.find(f => f.id === faultId);

    // Formu ilgili kayıtla doldur
    document.getElementById('machine').value = fault.machine;
    document.getElementById('part').value = fault.part;
    document.getElementById('date_time').value = fault.date_time;
    document.getElementById('first_name').value = fault.first_name;
    document.getElementById('last_name').value = fault.last_name;
    document.getElementById('fault_reason').value = fault.fault_reason;
    document.getElementById('fault_description').value = fault.fault_description;

    // Form gönderildiğinde localStorage'da güncelle
    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Formdan yeni verileri al
        fault.machine = document.getElementById('machine').value;
        fault.part = document.getElementById('part').value;
        fault.date_time = document.getElementById('date_time').value;
        fault.first_name = document.getElementById('first_name').value;
        fault.last_name = document.getElementById('last_name').value;
        fault.fault_reason = document.getElementById('fault_reason').value;
        fault.fault_description = document.getElementById('fault_description').value;

        // localStorage'daki diziyi güncelle
        const updatedFaults = storedFaults.map(f => f.id === faultId ? fault : f);
        localStorage.setItem('faults', JSON.stringify(updatedFaults));

        // Düzenleme tamamlandığında ana sayfaya yönlendir
        window.location.href = 'index.html';
    });
</script>

</body>
@endsection
