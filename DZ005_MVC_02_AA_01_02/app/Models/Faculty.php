<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
