<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function signIn() { return view('SignIn'); }
    public function signUp() { return view('SignUp'); }
    public function dashboard() { return view('dashboard'); }
    public function evacuationAreas() { return view('EvacuationAreas'); }
    public function approveLectures() { return view('ApproveLectures'); }
    public function feedbacks() { return view('Feedbacks'); }
    public function generateCertificates() { return view('GenerateCertificates'); }
    public function monitorHazard() { return view('MonitorHazard'); }
    public function employees() { return view('Employees'); }
    public function emergencyHotline() { return view('EmergencyHotlines'); }
    public function hazardAreas() { return view('HazardAreas'); }
    public function lectures() { return view('Lectures'); }
    public function lectureQuiz() { return view('LectureQuiz'); }
}
