@extends('layouts.app')

@section('content')
    <h1>Welcome, {{ auth()->user()->fullname }}</h1>

    <h2>Assigned Classes</h2>
    <table>
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Subject</th>
                <th>Number of Students</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignedClasses as $class)
                <tr>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->subject }}</td>
                    <td>{{ $class->students_count }}</td>
                    <td>
                        <a href="{{ route('class.details', ['id' => $class->id]) }}">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Upcoming Sessions</h2>
    <table>
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Session Date</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($upcomingSessions as $session)
                <tr>
                    <td>{{ $session->class_name }}</td>
                    <td>{{ $session->session_date }}</td>
                    <td>{{ $session->start_time }}</td>
                    <td>{{ $session->end_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Attendance Summary</h2>
    <table>
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Total Sessions</th>
                <th>Average Attendance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendanceSummary as $summary)
                <tr>
                    <td>{{ $summary->class_name }}</td>
                    <td>{{ $summary->total_sessions }}</td>
                    <td>{{ $summary->average_attendance }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
