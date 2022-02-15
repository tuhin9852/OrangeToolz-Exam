<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function getData()
    {
        $students = Student::paginate(8);
        return view('home', compact('students'));
    }

}
