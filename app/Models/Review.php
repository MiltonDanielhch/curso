<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //Relacion uno a muchos inversa
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function course():BelongsTo{
        return $this->belongsTo(Course::class);
    }
}
