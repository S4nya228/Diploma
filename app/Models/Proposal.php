<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded= false;

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($proposal) {
            if ($proposal->isDirty('response')) {
                if (!empty($proposal->response)) {
                    $proposal->status_id = 3; // Зміна статусу на 3, якщо пропозиція має відповідь
                } else {
                    $proposal->status_id = 2; // Зміна статусу на 2, якщо відповідь було видалено
                }
            }
        });

        static::updated(function ($proposal) {
            if ($proposal->isDirty('vote_count')) {
                if ($proposal->vote_count >= 5 && $proposal->status_id != 2) {
                    $proposal->status_id = 2; // Зміна статусу на 2, якщо vote_count досягає 2 або більше
                    $proposal->save(); // Зберігаємо зміну статусу
                }
            }
        });
    }


    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
