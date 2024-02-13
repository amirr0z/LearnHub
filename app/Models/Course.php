<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    function user():BelongsTo {
        return $this->belongsTo(User::class,'user_id');
    }

    function files():HasMany {
        return $this->hasMany(File::class,'course_id');
    }
}
