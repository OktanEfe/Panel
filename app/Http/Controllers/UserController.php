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
    return redirect()->route('user.index')->with('success', 'User added successfully');
  }

  public function index()
  {
    $users = User::all();
    return view('pages.user.index', compact('users'));
  }

  public function edit($id)
  {
    $users = User::findOrFail($id);
    return view('pages.user.edit', compact('users'));
  }

    public function update(UserRequest $request, $id)
    {
      $users = User::findOrFail($id);
      $users->update($request->validated());

      return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
  public function destroy($id)
  {
    $users = User::findOrFail($id);
    $users->delete();

    return redirect()->route('user.index')->with('success', 'Item deleted successfully');
  }
}
