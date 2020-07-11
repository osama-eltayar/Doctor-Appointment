<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use App\Model\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAppointment;
use App\Notifications\AppointmentUpdated;

class AppointmentController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $confirmedAppointments = Appointment::with(['doctor','patient'])->confirmed()->get();
            $pendingAppointments = Appointment::with(['doctor','patient'])->notAssigned()->get();
        } else {
            $user = Auth::user();
            $role = $user->roles->first()->name;
            $confirmedAppointments = Appointment::with(['doctor','patient'])->own($user->typeable_id, $role)->confirmed()->get();
            $pendingAppointments = Appointment::with(['doctor','patient'])->own($user->typeable_id, $role)->pending($role)->get();
        }

       
        return view('appointments.index', compact(['confirmedAppointments','pendingAppointments']));
    }

    public function store()
    {
        $patient = Auth::user()->typeable;
        $patient->appointments()->create();
        return back()->withSuccess('wait for admin confirmation');
    }

    public function edit(Appointment $appointment)
    {
        $doctors = Doctor::with('type')->get();
        return view('appointments.edit', compact('appointment', 'doctors'));
    }

    public function update(Appointment $appointment, UpdateAppointment $request)
    {
        $data = $request->only('date', 'doctor_id');
        $appointment->update($data);
        $this->sendNotification($appointment);
        return redirect('appointments');
    }

    public function change(Appointment $appointment, Request $request)
    {
        $this->authorize('update', $appointment);
        $user = Auth::user();
        $column = $user->hasRole('doctor')?'is_doctor_accept':'is_patient_accept';
        $appointment->update([
            $column=> $request->status ,
            ]);
        return redirect('/appointments');
    }


    private function sendNotification($appointment)
    {
        $doctor = $appointment->doctor->type;
        $patient = $appointment->patient->type;
        $doctor->notify(new AppointmentUpdated($patient->name, $appointment->date));
        $patient->notify(new AppointmentUpdated($doctor->name, $appointment->date));
    }
}
