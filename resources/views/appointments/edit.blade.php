@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/appointments/{{ $appointment->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Date</label>
            <input type="datetime-local" name="date" class="form-control">
        </div>
        <select name="doctor_id" class="form-control">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->type->name }}</option>
            @endforeach

        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
