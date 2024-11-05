<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Machine;
use App\Models\Part;

class MachinePartSelector extends Component
{
  public $machines;
  public $selectedMachine = null;
  public $parts = [];

  public function mount()
  {
    $this->machines = Machine::all();
    $this->selectedMachine = 1;
    $this->parts = Part::where('machine_id', $this->selectedMachine)->get();
  }

  public function updatedSelectedMachine($machineId)
  {
    // Seçilen makineye göre parçaları al ve güncelle
    $this->parts = Part::where('machine_id', $machineId)->get();
    dd($this->parts); // `parts` dizisinin dolup dolmadığını kontrol edin

  }

  public function render()
  {
    if ($this->selectedMachine) {
      $this->parts = Part::where('machine_id', $this->selectedMachine)->get();
    }

    return view('livewire.machine-part-selector', [
      'parts' => $this->parts,
    ]);
  }
}
