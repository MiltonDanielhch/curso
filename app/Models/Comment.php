<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //relacion uno a muchos inversa
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function commentable():MorphTo{
        return $this->morphTo();
    }
     //Relacion uno a muchos polimorficas
     public function comments():MorphMany{
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions():MorphMany{
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
