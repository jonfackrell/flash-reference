<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;

class Institution extends Model
{
    use GeneratesUuid;

    protected $guarded = [];

    protected $casts = [
        'consumer_key' => 'uuid',
        'secret' => 'uuid',
    ];

    public function uuidColumns(): array
    {
        return ['consumer_key', 'secret'];
    }
}
