<?php

namespace App\Models\admin\visa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class WorkVisa extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='work_visas';
}
