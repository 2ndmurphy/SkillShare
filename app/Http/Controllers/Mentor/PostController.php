<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mentor\StorePostRequest;
use App\Models\Room;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Tampilkan formulir untuk menulis Post undangan baru.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Room $room)
    {
        return view('mentor.post.create', [
            'room' => $room,
        ]);
    }

    /**
     * Simpan Post baru ke database.
     */
    public function store(StorePostRequest $request, Room $room)
    {
        $validated = $request->validated();

        $room->posts()->create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('mentor.rooms.show', $room)
            ->with('status', 'Post undangan berhasil dipublikasikan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Hapus (Soft Delete) post undangan dari room.
     * * @param \App\Models\Room $room
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Room $room, Post $post)
    {
        $post->delete();

        return redirect()->route('mentor.rooms.show', $room)
            ->with('status', 'Post undangan berhasil dihapus!');
    }
}
