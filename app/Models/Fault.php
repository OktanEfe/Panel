<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
  use HasFactory;
  protected $fillable = ['machine_id', 'created', 'user_id', 'part_id', 'cause_of_malfunction', 'description'];

  public function machine()
  {
    return $this->belongsTo(Machine::class);
  }

  public function part()
  {
    return $this->belongsTo(Part::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
