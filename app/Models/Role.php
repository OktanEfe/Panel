<?php

// Updated Role Model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\Permission;
use App\Models\User;

class Role extends SpatieRole
{
  use HasFactory;

  // Renamed to permissions for clarity
  public function permission()
  {
    return $this->belongsToMany(Permission::class, 'permission_role');
  }

  public function user()
  {
    return $this->belongsToMany(User::class, 'roles_user', 'role_id', 'user_id');
  }
}
