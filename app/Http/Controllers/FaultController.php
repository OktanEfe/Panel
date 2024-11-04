<?php

namespace App\Http\Controllers;

use App\Models\Fault;
use App\Models\Machine;
use App\Models\Part;
use Illuminate\Http\Request;

class FaultController extends Controller
{
  public function index()
  {
    $faults = Fault::with(['machine', 'part', 'user'])->get();
    return view('pages.fault.index', compact('faults'));
  }
  public function edit($id)
  {
    $fault = Fault::with(['machine', 'part', 'user'])->findOrFail($id);
    $machines = Machine::all(); // Tüm makineleri çek
    $parts = Part::all(); // Tüm parçaları çek

    return view('pages.fault.edit', compact('fault', 'machines', 'parts'));
  }

  public function update(Request $request, $id)
  {
    $fault = Fault::findOrFail($id);
    $fault->update($request->all());
    return redirect()->route('fault.index')->with('success', 'Arıza kaydı başarıyla güncellendi.');
  }

  public function destroy($id)
  {
    $fault = Fault::findOrFail($id);
    $fault->delete();
    return redirect()->route('fault.index')->with('success', 'Arıza kaydı başarıyla silindi.');
  }
}
