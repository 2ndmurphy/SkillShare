<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class RedirectHelper
{
    public static function getAuthButton()
    {
        // Jika belum login
        if (!Auth::check()) {
            return [
                'is_login' => false,
                'login_url' => route('login'),
                'register_url' => route('register'),
            ];
        }

        // Jika sudah login
        $user = Auth::user();

        if ($user->role === 'mentor') {
            return [
                'is_login' => true,
                'dashboard_url' => route('mentor.dashboard.index'),
                'label' => 'Dashboard',
            ];
        }

        if ($user->role === 'learner') {
            return [
                'is_login' => true,
                'dashboard_url' => route('explore.index'),
                'label' => 'Explore',
            ];
        }

        // fallback safety
        return [
            'is_login' => true,
            'dashboard_url' => route('dashboard'),
            'label' => 'Dashboard',
        ];
    }
}
