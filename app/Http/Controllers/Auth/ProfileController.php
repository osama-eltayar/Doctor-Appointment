<?php

namespace App\Http\Controllers\Auth;

use App\Model\Patient;
use App\Model\PainType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $painTypes = PainType::all();
        return view('auth.profile', compact('painTypes'));
    }

    public function update(UpdateProfile $request)
    {
        $user = Auth::user() ;
        $user->update($request->only(['email']));

        $patient = $request->only(['first_name', 'last_name', 'mobile','birth_date','country','gender','occupation','painType_id']);
        $patient = Patient::create($patient);
        $patient->type()->save($user);

        
        return redirect('/appointments');
    }
}
