<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{


    /**
     * The sets that belong to the course.
     */
    public function sets()
    {
        return $this->hasMany(Set::class);
    }

}
