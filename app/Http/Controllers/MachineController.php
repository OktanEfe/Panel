<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Part;

class MachineController extends Controller
{
    public function create()
    {
        return view('pages.machine.create');
    }

    public function store(Request $request)
    {
        // Doğrulama
        $request->validate([
            'machine_name' => 'required|string|max:255',
            'parts_count' => 'required|integer|min:1',
            'name' => 'required|array',
            'name.*' => 'required|string|max:255',
            'expiry_date' => 'required|array',
            'expiry_date.*' => 'required|date',
        ]);

        // Makineyi kaydedin
        $machine = Machine::create([
            'machine_name' => $request->input('machine_name'),
            'parts_count' => $request->input('parts_count')
        ]);

        // Parçaları kaydedin
        $partNames = $request->input('name');          // `name[]` ile uyumlu
        $partExpiries = $request->input('expiry_date'); // `expiry_date[]` ile uyumlu

        foreach ($partNames as $index => $name) {
            Part::create([
                'name' => $name,
                'expiry_date' => $partExpiries[$index],
                'machine_id' => $machine->id,
            ]);
        }

        return redirect()->route('machine.index')->with('success', 'Makine ve parçalar başarıyla kaydedildi.');
    }

    public function index()
    {
        // Tüm makineleri ve ilgili parçalarını çekiyoruz
        $machines = Machine::with('parts')->get();

        // View dosyasına $machines değişkenini gönderiyoruz
        return view('pages.machine.index', compact('machines'));
    }

    public function edit($id)
    {
        return view('pages.machine.edit', ['id' => $id]);
    }


    public function getParts($machineId)
    {
        $parts = Part::where('machine_id', $machineId)->get();
        return response()->json($parts);
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'machine_name' => 'required|string|max:255',
    ]);

    $machine = Machine::findOrFail($id);
    $machine->update([
        'machine_name' => $request->input('machine_name'),
    ]);

    return redirect()->route('machine.index')->with('success', 'Makine başarıyla güncellendi.');
}

public function destroy($id)
{
    $machine = Machine::findOrFail($id);
    $machine->delete();

    return redirect()->route('machine.index')->with('success', 'Makine başarıyla silindi.');
}

}
