<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Resource extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function resourceable():MorphTo{
        return $this->morphTo();
    }
}
