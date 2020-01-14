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

    protected $dates = [
        'enabled_to',
        'enabled_from',
        'last_access_at',
    ];

    public function uuidColumns(): array
    {
        return ['consumer_key', 'secret'];
    }
}
