<?php

namespace App\Http\Controllers;

class TeacherController extends Controller
{
    public function teacherDashboard()
    {
        $assignedClasses = ClassModel::withCount('students')
            ->where('teacher_id', auth()->id())
            ->get();
    
        $upcomingSessions = SessionModel::where('teacher_id', auth()->id())
            ->where('session_date', '>=', now())
            ->orderBy('session_date', 'asc')
            ->get();
    
        $attendanceSummary = Attendance::select('class_name')
            ->selectRaw('COUNT(DISTINCT session_id) as total_sessions')
            ->selectRaw('ROUND(AVG(is_present) * 100, 2) as average_attendance')
            ->groupBy('class_name')
            ->where('teacher_id', auth()->id())
            ->get();
    
        return view('teacher.dashboard', compact('assignedClasses', 'upcomingSessions', 'attendanceSummary'));
    }
    

}
