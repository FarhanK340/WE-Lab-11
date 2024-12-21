@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{ auth()->user()->fullname }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Session Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Credit Hours</th>
                    <th>Status</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendanceData as $attendance)
                    <tr class="{{ $attendance->is_present ? 'table-success' : 'table-danger' }}">
                        <td>{{ $attendance->class_name }}</td>
                        <td>{{ $attendance->session_date }}</td>
                        <td>{{ $attendance->start_time }}</td>
                        <td>{{ $attendance->end_time }}</td>
                        <td>{{ $attendance->credit_hours }}</td>
                        <td>{{ $attendance->is_present ? 'Present' : 'Absent' }}</td>
                        <td>{{ $attendance->comments }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
