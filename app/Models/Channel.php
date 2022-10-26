<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    public function userSubscribed() : bool
    {
        return $this->subscribers()->where('user_id', auth()->id())->exists();
    }
}
