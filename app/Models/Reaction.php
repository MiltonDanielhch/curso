<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    const LIKE = 1, DISLIKE = 2;

    //relacion uno a muchos inversa
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function reactionable():MorphTo{
        return $this->morphTo();
    }
}
