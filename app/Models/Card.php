<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Wildside\Userstamps\Userstamps;

class Card extends Model implements HasMedia, Sortable
{
    use HasMediaTrait, SortableTrait, Userstamps;

    protected $fillable = [
        'set_id',
        'front_image_url',
        'front_text',
        'back_image_url',
        'back_text',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $appends = [
        'starred',
    ];

    public function buildSortQuery()
    {
        return static::query()->where('set_id', $this->set_id);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function getStarredAttribute($value)
    {
        return ((Star::where('card_id', $this->getKey())->where('user_id', auth()->user()->id)->count() > 0)?true:false);
    }
}
