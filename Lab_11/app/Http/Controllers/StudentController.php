<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = auth()->user();

        // Fetch attendance data
        $attendanceData = Attendance::where('student_id', $student->id)
            ->join('classes', 'attendances.class_id', '=', 'classes.id')
            ->select('attendances.*', 'classes.name as class_name', 'classes.start_time', 'classes.end_time', 'classes.credit_hours')
            ->orderBy('attendances.session_date', 'desc')
            ->get();

        return view('pages.student_dashboard', compact('student', 'attendanceData'));
    }
}
