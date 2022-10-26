<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Dislike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $withCount =  [
        'likes',
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function getThumbnailAttribute()
    {
        if ($this->thumbnail_image) {
            return '/videos/' . $this->uid . '/' . $this->thumbnail_image;
        } else {
            return '/videos/' . 'dummy.jpg';
        }
    }

    public function getUploadDateAttribute()
    {
        $carbon = new Carbon($this->created_at);

        return $carbon->toFormattedDateString();
    }

    // to be use later
    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function userLikedVideo() : bool
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function userDislikedVideo() : bool
    {
        return $this->dislikes()->where('user_id', auth()->id())->exists();
    }
}
