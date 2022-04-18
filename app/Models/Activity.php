<?php

namespace App\Models;

class Activity extends \Illuminate\Database\Eloquent\Model
{
    public $guarded = ['id'];
    public $timestamps = false;
    protected $dates = ['time'];
}