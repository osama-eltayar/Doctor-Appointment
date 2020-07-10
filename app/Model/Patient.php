<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'mobile','country','birth_date','gender','occupation','painType_id'
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
