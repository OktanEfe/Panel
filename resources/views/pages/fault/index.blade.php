@extends('layouts/contentNavbarLayout')

@section('title', 'Makine Arıza Kaydı Oluştur')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arıza Kayıtları</title>
</head>
<body>

<div class="container mt-4">
    <h2>Arıza Kayıtları</h2>

    <!-- Arıza Kayıtları Tablosu -->
    <table class="table table-bordered" id="faultTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Makine</th>
                <th>Parça</th>
                <th>Tarih ve Saat</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Arıza Nedeni</th>
                <th>Arıza Açıklaması</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <!-- JavaScript ile dolacak -->
        </tbody>
    </table>
</div>

<script>
    // Örnek veriler (Veritabanı yerine localStorage kullanıyoruz)
    const faults = [
        { id: 1, machine: 'Makine 1', part: 'Parça 1', date_time: '2024-10-22T14:00', first_name: 'Ahmet', last_name: 'Yılmaz', fault_description: 'Motor bozuldu.' },
        { id: 2, machine: 'Makine 2', part: 'Parça 2', date_time: '2024-10-21T12:30', first_name: 'Mehmet', last_name: 'Kara', fault_description: 'Dişli kırıldı.' }
    ];

    // Veriyi localStorage'a kaydediyoruz (ilk kez sayfa açıldığında)
    if (!localStorage.getItem('faults')) {
        localStorage.setItem('faults', JSON.stringify(faults));
    }

    // localStorage'dan verileri al
    const storedFaults = JSON.parse(localStorage.getItem('faults'));

    // Tabloyu doldur
    const faultTableBody = document.querySelector('#faultTable tbody');
    storedFaults.forEach(fault => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${fault.id}</td>
            <td>${fault.machine}</td>
            <td>${fault.part}</td>
            <td>${fault.date_time}</td>
            <td>${fault.first_name}</td>
            <td>${fault.last_name}</td>
            <td>${fault.fault_reason}</td>
            <td>${fault.fault_description}</td>
            <td><a href="edit.html?id=${fault.id}" class="btn btn-warning">Düzenle</a></td>
        `;
        faultTableBody.appendChild(row);
    });
</script>

</body>
@endsection('content')
