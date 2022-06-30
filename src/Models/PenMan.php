<?php

namespace ArnobMonir\PenMan\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenMan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'pen_man_id',
        'event',
        'message',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'pen_man_id', 'id');
    }

    public function penable()
    {
        return $this->morphTo();
    }
}
