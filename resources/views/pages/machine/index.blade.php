@extends('layouts/contentNavbarLayout')

@section('title', 'Makine Listesi')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible custom-alert fade show" role="alert">
        <strong>Başarılı!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible custom-alert fade show" role="alert">
        <strong>Hata!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<!-- Her makine için ayrı bir tablo göstermek için döngü -->
@foreach($machines as $machine)
<div class="container mt-5 p-4 bg-light rounded shadow-sm">
    <!-- Makine Adı, Düzenle ve Sil Butonları -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-primary">{{ $machine->machine_name }}</h5>
        <div>
            <!-- Makineyi Düzenle ve Sil Butonları -->
            <button class="btn btn-warning btn-sm" onclick="openEditMachineModal({{ $machine->id }}, '{{ $machine->machine_name }}')">Makineyi Düzenle</button>

            <form action="{{ route('machine.destroy', $machine->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu makineyi silmek istediğinize emin misiniz?')">Makineyi Sil</button>
            </form>
        </div>
    </div>

    <!-- Makineye ait parçaları listeleyen tablo -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Parça İsimleri</th>
                <th>Son Kullanma Tarihi (SKT)</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <!-- Her parça için ayrı bir satır oluştur -->
            @foreach($machine->parts as $part)
            <tr>
                <td>{{ $part->name }}</td>
                <td>{{ $part->expiry_date }}</td>
                <td>
                    <!-- Parçayı Düzenle ve Sil Butonları -->
                    <button class="btn btn-info btn-sm" onclick="openEditPartModal({{ $part->id }}, '{{ $part->name }}', '{{ $part->expiry_date }}')">Düzenle</button>

                    <form action="{{ route('part.destroy', $part->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu parçayı silmek istediğinize emin misiniz?')">Sil</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Yeni Parça Ekleme Butonu -->
    <button class="btn btn-success btn-sm mt-3" onclick="openAddPartModal({{ $machine->id }})">+ Yeni Parça Ekle</button>
</div>
@endforeach

<!-- Yeni Parça Ekleme Modalı -->
<div class="modal fade" id="addPartModal" tabindex="-1" aria-labelledby="addPartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPartModalLabel">Yeni Parça Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addPartForm" action="{{ route('part.store') }}" method="POST">
        @csrf
        <!-- Makine ID'sini gizli bir input olarak ekliyoruz -->
        <input type="hidden" id="addPartMachineId" name="machine_id">
        <div class="modal-body">
          <div class="mb-3">
            <label for="addPartName" class="form-label">Parça İsmi</label>
            <input type="text" class="form-control" id="addPartName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="addExpiryDate" class="form-label">Son Kullanma Tarihi (SKT)</label>
            <input type="date" class="form-control" id="addExpiryDate" name="expiry_date" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
          <button type="submit" class="btn btn-primary">Ekle</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editMachineModal" tabindex="-1" aria-labelledby="editMachineModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMachineModalLabel">Makineyi Düzenle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editMachineForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="editMachineName" class="form-label">Makine İsmi</label>
            <input type="text" class="form-control" id="editMachineName" name="machine_name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
          <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editPartModal" tabindex="-1" aria-labelledby="editPartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPartModalLabel">Parçayı Düzenle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editPartForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="editPartName" class="form-label">Parça İsmi</label>
            <input type="text" class="form-control" id="editPartName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="editExpiryDate" class="form-label">Son Kullanma Tarihi (SKT)</label>
            <input type="date" class="form-control" id="editExpiryDate" name="expiry_date" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
          <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  // Makine Düzenleme Modalını Aç
  function openEditMachineModal(machineId, machineName) {
    const form = document.getElementById('editMachineForm');
    form.action = `/machine/${machineId}`;

    document.getElementById('editMachineName').value = machineName;

    new bootstrap.Modal(document.getElementById('editMachineModal')).show();
  }

  // Parça Düzenleme Modalını Aç
  function openEditPartModal(partId, partName, expiryDate) {
    const form = document.getElementById('editPartForm');
    form.action = `/part/${partId}`;

    document.getElementById('editPartName').value = partName;
    document.getElementById('editExpiryDate').value = expiryDate;

    new bootstrap.Modal(document.getElementById('editPartModal')).show();
  }

  // Yeni Parça Ekleme Modalını Aç
  function openAddPartModal(machineId) {
    // Makine ID'sini gizli input alanına koy
    document.getElementById('addPartMachineId').value = machineId;

    // Modalı aç
    new bootstrap.Modal(document.getElementById('addPartModal')).show();
  }
</script>

@endsection
