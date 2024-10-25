<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
      $user = auth()->user();

      // Giriş yapan kullanıcının rolünü kontrol edin
      if ($user->hasRole('Admin')) {
          return view('admin.dashboard'); // Admin sayfası
      } elseif ($user->hasRole('Supervisor')) {
          return view('Supervisor.dashboard'); // Editor sayfası
      } else {
          return view('Operator.dashboard'); // Viewer sayfası
      }
  }
}
