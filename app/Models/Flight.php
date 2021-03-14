<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
   // protected $guarded = [];

    protected $fillable = ['title','desc'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
