<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlidePage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='slide_pages';
    public function slide()
    {
    	return $this->belongsTo(Slide::class);
    }
}
