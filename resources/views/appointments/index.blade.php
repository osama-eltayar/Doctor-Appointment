@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>

    @endif
    @hasrole('patient')
        <div class="m-2">
            <form action="appointments" method="POST">
                @csrf
                <button class="btn btn-success">New Appointments</button>
            </form>
        </div>
    @endrole

    <h1>Confirmed Appointmeents</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>

                @unlessrole('patient')
                    <th scope="col">Patient</th>
                @endunlessrole
                @unlessrole('doctor')
                    <th scope="col">Doctor</th>
                @endunlessrole
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($confirmedAppointments as $appointment)
                <tr>

                    @unlessrole('patient')
                        <td>{{ $appointment->patient->type->name }}</td>
                    @endunlessrole
                    @unlessrole('doctor')
                        <td>{{ $appointment->doctor->type->name }}</td>
                    @endunlessrole
                    <th scope="row">{{ $appointment->date }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Penned Appointmeents</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                @unlessrole('patient')
                    <th scope="col">Patient</th>
                @endunlessrole
                @unlessrole('doctor')
                    <th scope="col">Doctor</th>
                @endunlessrole
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingAppointments as $appointment)
                <tr>
                    @unlessrole('patient')
                        <th scope="row">{{ $appointment->patient->type->name }}</th>
                    @endunlessrole
                    @unlessrole('doctor')
                        <td>{{ $appointment->doctor ? $appointment->doctor->type->name : 'Not Assigned' }}
                        </td>
                    @endunlessrole
                    <td>{{ $appointment->date }}</td>
                    @unlessrole('super-admin','admin')
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <form action="appointments/{{ $appointment->id }}/change" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="1">
                                        <button class="btn  btn-success">Accept</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form action="appointments/{{ $appointment->id }}/change" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="0">
                                        <button class="btn  btn-danger">Reject</button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    @else
                        <td>
                            <a href="/appointments/{{ $appointment->id }}/edit" class="btn btn-primary">Edit</a>
                        </td>
                    @endunlessrole
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
