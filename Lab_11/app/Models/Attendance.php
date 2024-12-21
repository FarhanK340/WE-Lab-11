<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // Define the table associated with the Attendance model
    protected $table = 'attendances';

    // Define the primary key if it's not the default 'id'
    protected $primaryKey = 'id';

    // Specify the fillable columns for mass assignment
    protected $fillable = [
        'student_id',
        'class_id',
        'session_date',
        'is_present',
        'comments',
    ];

    // Define the relationship with the Class model
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'id');
    }
}
