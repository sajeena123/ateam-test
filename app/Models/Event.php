<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [

        'title', 'start_date', 'end_date','user_id'

    ];
    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function event_invites() {
        return $this->HasMany(Event_invites::class, 'event_id');
    }

}