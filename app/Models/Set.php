<?php

namespace App;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use GeneratesUuid;

    protected $casts = [
        'uuid' => 'uuid'
    ];

    /**
     * The cards that belong to the set.
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function uuidColumns(): array
    {
        return ['uuid'];
    }

}
