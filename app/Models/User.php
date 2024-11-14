<?php

// Updated User Model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Role;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, HasRoles;

  // Fixed method name to assignRole
  public function assignRole($roleName)
  {
    $role = Role::where('name', $roleName)->first();
    $this->roles()->attach($role);
  }

  public function roles()
  {
    return $this->belongsToMany(Role::class, 'roles_user', 'user_id', 'role_id');
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

  protected $fillable = [
    'name',
    'surname',
    'email',
    'password',
    'phone_number',
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
