<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $dates = [ "ts", "created_at", "updated_at" ];
}
