<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Festival extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='festivals';
}
