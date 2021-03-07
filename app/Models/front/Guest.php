<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Guest extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='guests';
}
