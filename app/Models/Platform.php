<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Platform extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function lessons():HasMany{
        return $this->hasMany(Lesson::class);
    }
}
