<?php
// app/controllers/StudentController.php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    private function student_data()
    {
        return [
            'page_title' => 'student profile',
            'student_id' => 'MCC2024-00057',
            'name'       => 'Wrysha Mae F. Fesalbon',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => 'F2',
            'email'      => 'fuentesrwysha@gmail.com',
            'skills'     => 'Cooking, Writing, Graphic Design',
            'hobbies'    => 'Reading, Gaming, Camping',
            'profile'    => 'An aspiring Cybersecurity professional passionate about technology.'
        ];
    }

    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $data = $this->student_data();
        $data['access_message'] = $_SESSION['student_access_message'] ?? '';
        unset($_SESSION['student_access_message']);

        $_SESSION['student_access'] = true;
        $_SESSION['student_token']  = hash(
            'sha256',
            $this->student_data()['student_id']
        );

        $this->call->view('student/index', $data);
    }

    public function profile()
    {
        $this->call->view('student/profile', $this->student_data());
    }
}
