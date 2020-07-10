<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PainType extends Model
{
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
}
