<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Afficher le tableau de bord
    public function index()
    {
        $students = Student::count();
        $departments = Department::count();
        $users = User::count();
        $teachers = Teacher::count();
    
        if (Auth::user()->role === 'teacher') {
            return view('Dashboard.teacher-dashboard', compact('students', 'departments', 'teachers'));
        } elseif (Auth::user()->role === 'student') {
            return view('Dashboard.student-dashboard', compact('students', 'departments', 'teachers'));
        } else {
            return view('Dashboard.admin-dashboard', compact('students', 'departments', 'users', 'teachers'));
        }
    }
    
    
   
}
