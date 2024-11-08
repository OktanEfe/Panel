<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;

class PartController extends Controller
{
    // Parçayı düzenleme formunu gösterir
    public function edit($id)
    {
        $part = Part::findOrFail($id);
        return response()->json($part); // Düzenleme için JSON olarak gönderilir
    }

    // Parçayı günceller
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expiry_date' => 'required|date',
        ]);

        $part = Part::findOrFail($id);
        $part->update([
            'name' => $request->input('name'),
            'expiry_date' => $request->input('expiry_date'),
        ]);

        return redirect()->route('machine.index')->with('success', 'Parça başarıyla güncellendi.');
    }

    // Yeni bir parça oluşturur
    public function store(Request $request)
    {
        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'name' => 'required|string|max:255',
            'expiry_date' => 'required|date',
        ]);

        Part::create([
            'machine_id' => $request->input('machine_id'),
            'name' => $request->input('name'),
            'expiry_date' => $request->input('expiry_date'),
        ]);

        return redirect()->route('machine.index')->with('success', 'Yeni parça başarıyla eklendi.');
    }

    // Parçayı siler
    public function destroy($id)
    {
        $part = Part::findOrFail($id);
        $part->delete();

        return redirect()->route('machine.index')->with('success', 'Parça başarıyla silindi.');
    }
}
