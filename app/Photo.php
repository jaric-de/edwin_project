<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];

    protected $uploads = '/images/';

    public function getFileAttribute($value)
    {
        return $this->uploads . $value;
//        return $this->uploads . $this->attributes['file']; // работает
//        return $this->uploads . $this->file; // не работает
    }
}
