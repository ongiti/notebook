<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title','body','notebook_id'];


    public function Notebook(){

        return $this->belongsTo(Notebook::class);
    }
}
