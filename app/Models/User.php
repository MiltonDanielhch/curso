<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Relacion uno a uno
    public function profile():HasOne{
        return $this->hasOne(Profile::class);
    }

     //Relacion uno a muchos
     public function courses_dictated():HasMany{
        return $this->hasMany(Course::class);
    }

     //Relacion uno a muchos
     public function reviews():HasMany{
        return $this->hasMany(Review::class);
    }

    public function comments():HasMany{
        return $this->hasMany(Comment::class);
    }

    public  function reactions():HasMany{
        return $this->hasMany(Reaction::class);
    }

    //Relacion muchos a muchos
    public function courses_enrolled():BelongsToMany{
        return $this->belongsToMany(Course::class);
    }
    public function lessons(){
        return $this->belongsToMany(Lesson::class);
    }
}
