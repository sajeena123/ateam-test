<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_invites extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', 'token','event_id'
    ];

    public function events(){
               return $this->hasMany(Event::class, 'event_id');
   }
}
