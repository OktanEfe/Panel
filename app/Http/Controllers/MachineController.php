<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function create()
    {
        return view('machine.create');
    }

    public function store()
    {
        return view('machine.store');
    }

    public function index()
    {
        return view('machine.index');
    }

    public function edit($id)
    {
        return view('machine.edit', ['id' => $id]);
    }

    public function update($id)
    {
        return view('machine.update', ['id' => $id]);
    }
}
