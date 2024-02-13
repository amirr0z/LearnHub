<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    function user():BelongsTo {
        return $this->belongsTo(User::class,'user_id');
    }

    function course():BelongsTo {
        return $this->belongsTo(Course::class,'course_id');
    }
}
