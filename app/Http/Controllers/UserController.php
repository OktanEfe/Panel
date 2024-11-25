<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role; // Role modelini dahil edin
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function create()
  {
    $roles = Role::all();
    return view('pages.user.create', compact('roles'));
  }


  public function store(UserRequest $request)
  {
    //  dd($request->role_id);

    // Validated edilmiş veriyi al
    $userData = $request->validated();

    $user = User::create([
      'name' => $userData['name'],
      'surname' => $userData['surname'],
      'phone_number' => $userData['phone_number'],
      'email' => $userData['email'],
      'password' => bcrypt($userData['password']),
    ]);

    $role = Role::find($request->role_id);

    // Kullanıcıya rolü ata
    $user->roles()->attach($role);

    return redirect()->route('user.index')->with('success', 'User added successfully');
  }

  public function index()
  {
    $users = User::with('roles')->get(); // Rol ile birlikte yükleyin

    return view('pages.user.index', compact('users'));
  }


  public function edit($id)
  {
    // Belirli bir kullanıcıyı düzenlemek için
    $user = User::findOrFail($id);

    // Tüm rolleri al
    $roles = Role::all(); // Pluck yerine tüm rolleri alarak dinamik form oluşturuyoruz

    return view('pages.user.edit', compact('user', 'roles'));
  }


  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);

    // Gelen verileri doğrula
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'surname' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email,' . $id, // Unique kontrol
      'phone_number' => 'required|string|max:15',
      'password' => 'nullable|string|min:8', // Parola isteğe bağlı
      'role_id' => 'required|exists:roles,id', // Rolün geçerli olduğundan emin ol
    ]);

    // Kullanıcı bilgilerini güncelle
    $user->update([
      'name' => $validated['name'],
      'surname' => $validated['surname'],
      'email' => $validated['email'],
      'phone_number' => $validated['phone_number'],
      'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
    ]);

    // Kullanıcının rolünü güncelle
    $user->roles()->sync([$validated['role_id']]);

    return redirect()->route('user.index')->with('success', 'Kullanıcı başarıyla güncellendi!');
  }

  public function destroy($id)
  {
    $user = User::findOrFail($id);

    // dd($user);

    $user->deleted_at = now();
    $user->save();

    // Kullanıcıyı tamamen sil
    // $user->forceDelete();

    return redirect()->route('user.index')->with('success', 'Kullanıcı başarıyla tamamen silindi!');
  }
}
