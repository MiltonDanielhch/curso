<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Course extends Model
{
    use HasFactory;

    const BORRADOR = 1, REVISION = 2, PUBLICADO = 3;

    //Relacion uno a muchos
    public function reviews():HasMany{
        return $this->hasMany(Review::class);
    }

    public function requirements():HasMany{
        return $this->hasMany(Requirement::class);
    }

    public function goals():HasMany{
        return $this->hasMany(Goal::class);
    }

    public function audiences():HasMany{
        return $this->hasMany(Audience::class);
    }

    public function sections():HasMany{
        return $this->hasMany(Section::class);
    }

    //Relacion uno a muchos inversa
    public function teacher():BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function level():BelongsTo{
        return $this->belongsTo(Level::class);
    }
    public function category():BelongsTo{
        return $this->belongsTo(Level::class);
    }

    public function price():BelongsTo{
        return $this->belongsTo(Level::class);
    }

    //Relacion muchos a muchos
    public function students():BelongsToMany{
        return $this->belongsToMany(User::class);
    }

     //relacion uno a muchos polimorficas
     public function image():MorphOne{
        return $this->morphOne(Image::class, 'imageable');
    }

    public function lessons():HasManyThrough{
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}
