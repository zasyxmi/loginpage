<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timetable extends Model
{
    protected $table = 'student_timetables';

    protected $fillable = [
        
        'subject_id',
        'day_id',
        'hall_id',
        'lecturer_group_id',
        'time_from',
        'time_to',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }

    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function lecturerGroup(): BelongsTo
    {
        return $this->belongsTo(LecturerGroup::class);
    }
}