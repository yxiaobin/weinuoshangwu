<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    protected $table = "friends";
    protected $primaryKey = "id";
    public $timestamps = false;
}
