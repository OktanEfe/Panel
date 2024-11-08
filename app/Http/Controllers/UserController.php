<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role; // Role modelini dahil edin

class UserController extends Controller
{
  public function create()
  {
    // Sadece "admin" rolünü çekiyoruz (gerekirse bu kısmı ileride genişletebilirsiniz)
    $roles = Role::where('name', 'admin')->pluck('name', 'id');
    return view('pages.user.create', compact('roles'));
  }

  public function store(UserRequest $request)
  {
    // Kullanıcı kaydında role_id alanını varsayılan olarak "admin" olacak şekilde ekliyoruz
    $userData = $request->validated();
    $userData['role_id'] = $userData['role_id'] ?? 1; // role_id yoksa 1 (admin) olarak ayarla

    User::create($userData);

    return redirect()->route('user.index')->with('success', 'User added successfully');
  }

  public function index()
  {
    $users = User::with('role')->get();
    return view('pages.user.index', compact('users'));
  }

  public function edit($id)
  {
    // Belirli bir kullanıcıyı düzenlemek için
    $user = User::findOrFail($id);
    $roles = Role::where('name', 'admin')->pluck('name', 'id');
    return view('pages.user.edit', compact('user', 'roles'));
  }

  public function update(UserRequest $request, $id)
  {
    // Kullanıcıyı güncelleme
    $user = User::findOrFail($id);
    $userData = $request->validated();
    $userData['role_id'] = $userData['role_id'] ?? $user->role_id; // Mevcut role_id'yi koru veya yenisi ile güncelle

    $user->update($userData);

    return redirect()->route('user.index')->with('success', 'Kullanıcı güncellendi!!');
  }

  public function destroy($id)
  {
    // Kullanıcıyı silme işlemi
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('user.index')->with('success', 'Kullanıcı başarılı bir şekilde silindi!!!');
  }
}
