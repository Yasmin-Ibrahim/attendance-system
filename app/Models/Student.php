<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $table = 'students';
    protected $guarded = [];

    public function parents()
    {
        return $this->hasMany(Parents::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
