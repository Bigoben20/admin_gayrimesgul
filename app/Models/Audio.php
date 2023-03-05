<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $fillable = ['name','filepath'];
    protected $casts = [
        'genres' => 'array'
    ];

    public function getFilePathAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
