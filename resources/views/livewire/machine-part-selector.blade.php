<div>
  <!-- Makine Seçimi -->
  <div class="mb-3">
      <label for="machine" class="form-label">Makine Seçin</label>
      <select wire:model="selectedMachine" class="form-select" id="machine" name="machine" required>
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
          @foreach($parts as $part)
              <option value="{{ $part->id }}">{{ $part->name }}</option>
          @endforeach
      </select>
  </div>
</div>
