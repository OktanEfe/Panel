<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\User;
use App\Models\Permission;


class Role extends SpatieRole
{
  public function permission()
  {
    return $this->belongsToMany(Permission::class, 'permission_role');
  }

  public function user()
  {
    return $this->belongsToMany(User::class, 'role_user');
  }
}
