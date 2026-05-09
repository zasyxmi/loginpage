<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Hall;
use App\Models\LecturerGroup;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Timetable;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'students' => Student::count(),
            'subjects' => Subject::count(),
            'halls' => Hall::count(),
            'days' => Day::count(),
            'groups' => LecturerGroup::count(),
            'timetables' => Timetable::count(),
        ];

        return view('home', compact('stats'));
    }
}
