@extends('layouts/contentNavbarLayout')

@section('title', 'Makine Arıza Kaydı Oluştur')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container mt-4">
    <h2>Makine Arıza Kaydı Oluştur</h2>

    <!-- Form -->
    <form action="{{ route('fault.store') }}" method="POST">
        @csrf

        <!-- Makine Seçimi -->
        <div class="mb-3">
            <label for="machine" class="form-label">Makine Seçin</label>
            <select class="form-select" id="machine" name="machine_id" required>
                <option value="" disabled selected>Makine seçin</option>
                @foreach($machines as $machine)
                    <option value="{{ $machine->id }}">{{ $machine->machine_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Parça Seçimi -->
        <div class="mb-3">
          <label for="part" class="form-label">Parça Seçin</label>
          <select class="form-select" id="part" name="part_id" required>
              <option value="" disabled selected>Parça seçin</option>
          </select>
        </div>

        <!-- Diğer Form Alanları -->
        <div class="mb-3">
            <label for="date_time" class="form-label">Arıza Kayıt Tarihi (Makine durma tarihi)</label>
            <input type="datetime-local" class="form-control" id="stop_time" name="stop_time" required>
        </div>
        <div class="mb-3">
          <label for="date_time" class="form-label"> Arıza Bitiş Tarihi (Makine Başlama tarihi)</label>
          <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>

        <div class="mb-3">
          <label for="cause_of_malfunction" class="form-label">Arıza Nedeni</label>
          <input type="text" class="form-control" id="cause_of_malfunction" name="cause_of_malfunction" required>
      </div>

        <div class="mb-3">
            <label for="description" class="form-label">Arıza Açıklaması</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kaydı Oluştur</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {

       $('#machine').on('change', function() {
           var machineId = $(this).val();
           console.log('Makine ID:', machineId);

           if (machineId) {
               $.ajax({
                   url: '/get-parts/' + machineId,
                   type: 'GET',
                   dataType: 'json',
                   success: function(data) {
                       console.log('Gelen Parçalar:', data);

                       $('#part').empty();
                       $('#part').append('<option value="" disabled selected>Parça seçin</option>');

                       $.each(data, function(index, part) {
                           $('#part').append('<option value="'+ part.id +'">'+ part.name +'</option>');
                       });
                   },
                   error: function(xhr, status, error) {
                       console.error("Parçalar yüklenirken hata oluştu:", error);
                       alert("Parçalar yüklenirken bir hata oluştu.");
                   }
               });
           } else {
               $('#part').empty();
               $('#part').append('<option value="" disabled selected>Parça seçin</option>');
           }
       });
   });
</script>

@endsection
