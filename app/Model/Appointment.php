<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['date','doctor_id','patient_id','is_patient_accept','is_doctor_accept'];

    public function doctor()
    {
        return $this->belongsTo('App\Model\Doctor');
    }

    public function patient()
    {
        return $this->belongsTo('App\Model\Patient');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('is_doctor_accept', 1)
                    ->where('is_patient_accept', 1);
    }

    public function scopePending($query, $role)
    {
        return $query->whereNotNull('date')
                    ->where("is_{$role}_accept");
    }

    public function scopeOwn($query, $userId, $role)
    {
        return $query->where("{$role}_id", $userId);
    }

    public function scopeNotAssigned($query)
    {
        return $query->whereNull('date')
                    ->orwhere('is_doctor_accept', 0)
                    ->orwhere('is_patient_accept', 0);
    }
}
