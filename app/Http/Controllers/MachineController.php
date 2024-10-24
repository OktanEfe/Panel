<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.machine.index');
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
