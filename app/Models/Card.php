<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Wildside\Userstamps\Userstamps;

class Card extends Model implements HasMedia
{
    use HasMediaTrait, Userstamps;

    protected $fillable = [
        'front_image',
        'front_text',
        'back_image',
        'back_text',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
}
