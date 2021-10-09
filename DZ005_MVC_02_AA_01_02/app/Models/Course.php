<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'professor_id',
        'department_id'
    ];

    public function students(): BelongsToMany {
        return $this->belongsToMany(Student::class, 'student_course');
    }

    public function professor(): BelongsTo {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function department(): BelongsTo {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
