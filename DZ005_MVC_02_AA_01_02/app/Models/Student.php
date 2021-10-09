<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'faculty_id'
    ];

    public function faculty(): BelongsTo {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function courses(): BelongsToMany {
        return $this->belongsToMany(Course::class, 'student_course');
    }

}
