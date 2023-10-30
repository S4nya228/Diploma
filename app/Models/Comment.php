<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=false;

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likesCount($interactionType)
    {
        return $this->likeComment()->where('interaction_type', $interactionType)->count();
    }

    public function likeComment()
    {
        return $this->hasMany(LikeComment::class);
    }
}

