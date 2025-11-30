<?php

namespace App\Providers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // (Policy Anda yang lain mungkin sudah ada di sini)
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 4. TAMBAHKAN KODE GATE DI SINI
        Gate::define('view-joined-room', function (User $user, Room $room) {
            // Cek di tabel pivot 'room_members'
            return $user->rooms()->where('room_id', $room->id)->exists();
        });
    }
}