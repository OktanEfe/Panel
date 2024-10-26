<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function create()
    {
        return view('pages.user.create');
    }

    public function store(UserRequest $request)
    {
      User::create($request->validated());
      return redirect()->route('pages.users.index')->with('success', 'User added successfully');

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
