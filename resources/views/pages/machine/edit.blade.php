@extends('layouts/contentNavbarLayout')

@section('title', 'Makine Düzenle')
@section('content')
<div class="container">
    <h1>Makine Düzenle</h1>

    <!-- Makine Seçimi -->
    <form>
        <!-- Makinenin İsmi -->
        <div class="form-group">
          <label for="machineSelect">Makine Seçimi</label>
          <select id="machineSelect" class="form-control" required>
              <option value="">Makine Seçin</option>
              <!-- Dinamik olarak makineleri listeleyin -->
              <option value="1">Makine 1</option>
              <option value="2">Makine 2</option>
              <option value="3">Makine 3</option>
              <!-- Diğer makineler buraya dinamik olarak eklenebilir -->
          </select>
      </div>

        <!-- Mevcut Parçalar -->
        <h3>Mevcut Parçalar</h3>
        <div id="partsContainer" class=" col-4 , 'my-4'">
            <!-- Varsayılan olarak bir örnek parça -->
            <div class="form-group part-item" id="part-0">
                <label for="partName_0">Parça İsmi</label>
                <input type="text" name="part_names[]" class="form-control" placeholder="Parça ismini girin" required>

                <label for="partExpiry_0">Son Kullanma Tarihi (SKT)</label> <!-- bakım süresi gibi bir şey yazılabilir son kullanma tarihi değil de benim de aklıma gelmedi -->
                <input type="date" name="part_expiries[]" class="form-control" required>

                <!-- Parça Silme Butonu -->
                <button type="button" class="btn btn-danger removePartBtn" data-index="0">Parçayı Sil</button>
            </div>
        </div>

        <!-- Yeni Parça Ekleme Butonu -->
        <button type="button" class="btn btn-secondary" id="addPartBtn">Yeni Parça Ekle</button>

        <!-- Bu buton şu an sadece görünümde, backend'e gönderme işlevi yok -->
        <div class="form-group mt-4">
            <button type="button" class="btn btn-primary">Kaydet</button>
        </div>
    </form>
</div>

<!-- Javascript ile Dinamik Parça Yönetimi -->
<script>
    // Parça sayısını takip etmek için bir sayaç
    var partIndex = 1;

    // Parça Ekleme Butonu Olayı
    document.getElementById('addPartBtn').addEventListener('click', function () {
        var partsContainer = document.getElementById('partsContainer');

        // Yeni parça formunu oluştur
        var newPart = document.createElement('div');
        newPart.classList.add('form-group', 'part-item');
        newPart.id = 'part-' + partIndex;
        newPart.innerHTML = `
            <label for="partName_${partIndex}">Parça İsmi</label>
            <input type="text" name="part_names[]" class="form-control" placeholder="Parça ismini girin" required>

            <label for="partExpiry_${partIndex}">Son Kullanma Tarihi (SKT)</label>
            <input type="date" name="part_expiries[]" class="form-control" required>

            <button type="button" class="btn btn-danger removePartBtn" data-index="${partIndex}">Parçayı Sil</button>
        `;

        partsContainer.appendChild(newPart);
        partIndex++;
    });

    // Parça Silme İşlevi
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('removePartBtn')) {
            var partIndex = e.target.getAttribute('data-index');
            var partElement = document.getElementById('part-' + partIndex);
            partElement.remove();
        }
    });
</script>
@endsection
