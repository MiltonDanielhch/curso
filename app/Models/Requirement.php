<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Requirement extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa
    public function course():BelongsTo{
        return $this->belongsTo(Course::class);
    }
}
