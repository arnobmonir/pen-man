<?php

namespace ArnobMonir\PenMan\Traits;

use ArnobMonir\PenMan\Models\PenMan as ModelsPenMan;
use Illuminate\Support\Facades\Auth;

trait PenMan
{
    public function pen_man()
    {
        return $this->morphMany(ModelsPenMan::class, 'penable');
    }
    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            if (Auth::user() != null) :
                $model->pen_man()->create([
                    'pen_man_id' => Auth::user()->id,
                    'event' => 'created',
                    'message' => 'This record is created by ' . Auth::user()->name,

                ]);
            endif;
        });
        static::updated(function ($model) {
            if (Auth::user() != null) :
                $model->pen_man()->create([
                    'pen_man_id' => Auth::user()->id,
                    'event' => 'updated',
                    'message' => 'This record is updated by ' . Auth::user()->name,

                ]);
            endif;
        });
        static::deleted(function ($model) {
            if (Auth::user() != null) :
                $model->pen_man()->create([
                    'pen_man_id' => Auth::user()->id,
                    'event' => 'deleted',
                    'message' => 'This record is deleted by ' . Auth::user()->name,

                ]);
            endif;
        });
    }
}
