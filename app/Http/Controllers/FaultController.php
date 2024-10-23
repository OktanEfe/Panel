<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaultController extends Controller
{

public function index(){
  return view ('pages.fault.index');
}



    public function create()
    {
        return view('pages.fault.create');
    }

    public function store()
    {



        return redirect()->route('fault.create')->with('success', 'Arıza kaydı başarıyla oluşturuldu!');
    }
    public function edit($id)
    {


        return view('pages.fault.edit');
    }

    public function update(Request $request, $id)
    {



        session()->flash('success', 'Arıza kaydı başarıyla güncellendi!');

        return redirect()->route('fault.index');
    }

}
