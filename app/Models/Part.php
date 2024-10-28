<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
  use HasFactory;
  protected $fillable = ['machine_id', 'name', 'expiry_date'];
  public function machine()
  {
    return $this->belongsTo(Machine::class);
  }

  public function faults()
  {
    return $this->hasMany(Fault::class);
  }
}
