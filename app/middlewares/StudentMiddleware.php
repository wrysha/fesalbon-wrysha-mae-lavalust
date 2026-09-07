<?php
// app/middlewares/StudentMiddleware.php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $expected_token = hash('sha256', 'MCC2024-00057');

        $allowed =
            ($_SESSION['student_access'] ?? false) === true &&
            hash_equals(
                $expected_token,
                $_SESSION['student_token'] ?? ''
            );

        if (!$allowed) {
            $_SESSION['student_access_message'] = 'Access denied: visit Student Home first before viewing the profile.';
            redirect('student');
            return null;
        }

        return $next();
    }
}
