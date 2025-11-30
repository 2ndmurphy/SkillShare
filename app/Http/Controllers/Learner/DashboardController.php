<?php

namespace App\Http\Controllers\Learner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard untuk learner.
     * Dashboard ini berisi daftar room yang telah di-join.
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil data room yang sudah di-join oleh user
        $joinedRooms = $user->rooms()
            ->with(['mentor', 'roomType'])
            ->latest('pivot_joined_at')
            ->get();

        return view('learner.dashboard', compact('joinedRooms'));
    }
}
