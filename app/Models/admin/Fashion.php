<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Fashion extends Model
{
    use HasFactory;
    protected $table='fashions';
    use SoftDeletes;
}
