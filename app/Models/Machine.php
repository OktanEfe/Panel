<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
  protected $fillable = ['machine_name', 'parts_count'];
  use HasFactory;

  public function parts()
  {
    return $this->hasMany(Part::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function faults()
  {
    return $this->hasMany(Fault::class);
  }
}
