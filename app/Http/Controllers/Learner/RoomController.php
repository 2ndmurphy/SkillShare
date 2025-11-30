<?php

namespace App\Http\Controllers\Learner;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    /**
     * Menampilkan halaman 'ruang kelas' privat untuk room yang sudah di-join.
     * Hanya bisa diakses oleh member.
     */
    public function show(Room $room)
    {
        // Cek apakah user boleh 'view-joined-room'.
        // Definisikan 'view-joined-room' di Gate.
        Gate::authorize('view-joined-room', $room);

        // Load materi dan mentor untuk ditampilkan
        $room->load(['materials', 'mentor']);

        return view('learner.room.show', compact('room'));
    }
}
