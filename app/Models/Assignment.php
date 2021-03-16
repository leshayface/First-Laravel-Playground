<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function complete() {

        $this->completed = true; //can just use this instead of defining where Assignment is
        $this->save();

    }
}
