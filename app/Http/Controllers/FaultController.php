<?php

namespace App\Http\Controllers;

use App\Models\Fault;
use App\Models\Machine;
use App\Models\Part;
use App\Models\User;
use Illuminate\Http\Request;

class FaultController extends Controller
{
  public function create()
  {
    $machines = Machine::all();
    $parts = Part::all();
    $users = User::all();

    return view('pages.fault.create', compact('machines', 'parts', 'users'));
  }
  public function store(Request $request)
  {
    $request->validate([
      'machine_id' => 'required|exists:machines,id',
      'part_id' => 'required|exists:parts,id',
      'stop_time' => 'required|date',
      'user_id' => 'required|exists:users,id', // `user` yerine `users` olarak düzeltilmeli
      'start_time' => 'required|date',
      'cause_of_malfunction' => 'required|string|max:255',
      'description' => 'required|string|max:1000',
    ]);

    try {
      Fault::create([
        'machine_id' => $request->machine_id,
        'part_id' => $request->part_id,
        'stop_time' => $request->stop_time,
        'start_time' => $request->start_time,
        'user_id' => $request->user_id,
        'cause_of_malfunction' => $request->cause_of_malfunction,
        'description' => $request->description,
      ]);

      return redirect()->route('fault.index')->with('success', 'Arıza kaydı başarıyla oluşturuldu.');
    } catch (\Exception $e) {
      return back()->withErrors(['error' => 'Bir hata oluştu: ' . $e->getMessage()]);
    }
  }


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
  public function getParts($machineId)
  {
    // Belirli makineye ait parçaları bul
    $parts = Part::where('machine_id', $machineId)->get();

    // JSON formatında döndür
    return response()->json($parts);
  }
}
