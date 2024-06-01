<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Description extends Model
{
    use HasFactory;

    //Relacion uno a uno inversa
    public function lesson():BelongsTo{
        return $this->belongsTo(Lesson::class);
    }
}
