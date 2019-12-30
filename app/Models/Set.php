<?php

namespace App;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{

    use GeneratesUuid;

    protected $casts = ['uuid' => 'uuid'];

}
