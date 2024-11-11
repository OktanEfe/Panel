<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;



  public function assingRole($roleName)
  {
    $role = Role::where('name', $roleName)->first();
    $this->roles()->attach($role);
  }
  public function role()
  {
    return $this->belongsTo(Role::class);
  }
  public function hasRole($role)
  {
    return $this->roles()->where('name', $role)->exists();
  }

  public function permissions()
  {
    return $this->roles()->with('permissions')->get()->pluck('permissions')->flatten();
  }
  public function machines()
  {
    return $this->hasMany(Machine::class);
  }

  public function faults()
  {
    return $this->hasMany(Fault::class);
  }

  public function hasPermission($permission)
  {
    return $this->roles()
      ->whereHas('permissions', function ($query) use ($permission) {
        $query->where('name', $permission);
      })
      ->exists();
  }

  // The attributes that are mass assignable.
  protected $fillable = [
    'name',
    'surname',
    'email',
    'password',
    'phone_number',
    'role_id'

  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];
}
