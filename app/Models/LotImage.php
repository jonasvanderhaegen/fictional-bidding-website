<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LotImage extends Model
{
    // Traits
    use softDeletes;

    // Variables
    protected $fillable = [
        'base64_normal',
        'base64_thumbnail',
        'width',
        'height',
        'primary',
        'deleted_at'
    ];


    // Relations

        // one LotImage to one x

        // one LotImage to many x

        // many LotImages to one

        // many LotImages to many x

        // polymorphic
        public function imageable(): MorphTo
        {
            return $this->morphTo();
        }
}
