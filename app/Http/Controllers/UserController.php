<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('pages.user.create');
    }

    public function store()
    {
        return view('pages.user.store');
    }

    public function index()
    {
        return view('pages.user.index');
    }

    public function edit($id)
    {
        return view('pages.user.edit', ['id' => $id]);
    }

    public function update($id)
    {
        return view('pages.user.update', ['id' => $id]);
    }
}
