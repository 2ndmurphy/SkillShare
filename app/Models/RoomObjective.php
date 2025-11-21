<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomObjective extends Model
{
    protected $fillable = [
        'room_id',
        'title',
        'level',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function progress()
    {
        return $this->hasMany(ObjectiveProgress::class, 'objective_id');
    }
}
