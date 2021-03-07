<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Slide extends Model
{
    protected $table='slides';
    use HasFactory;
  public function slicons()
  {
  	return $this->hasMany(SlidePage::class);
  }
}
