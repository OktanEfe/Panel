<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;

class MachineController extends Controller
{
  public function create()
  {
    return view('pages.machine.create');
  }

  public function store()
  {
    return view('pages.machine.store');
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

  public function update($id)
  {
    return view('pages.machine.update', ['id' => $id]);
  }
}
