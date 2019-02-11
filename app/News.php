<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = "news";
    protected $primaryKey = "id";
    public $timestamps = false;
    public function kind(){
        return $this->belongsTo("App\Category","category_id","id")->withDefault();
    }
}
