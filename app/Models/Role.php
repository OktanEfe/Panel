<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
