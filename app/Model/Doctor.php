<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'specialty'
    ];
    public function type()
    {
        return $this->morphOne('App\User', 'typeable');
    }

    public function appointments()
    {
        return $this->hasMany('App\Model\Appointment');
    }
}
