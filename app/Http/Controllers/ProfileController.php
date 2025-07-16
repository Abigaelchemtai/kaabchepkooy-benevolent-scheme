<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        $contributions = $user->contributions()->latest()->get(); // 🔥 Add this line
    
        $monthlyContributions = $user->contributions()
            ->where('frequency', 'monthly')
            ->sum('amount');
    
        $yearlyContributions = $user->contributions()
            ->where('frequency', 'yearly')
            ->sum('amount');
    
        $totalContributions = $user->contributions()->sum('amount');
    
        return view('profile.index', compact(
            'user',
            'contributions',
            'monthlyContributions',
            'yearlyContributions',
            'totalContributions'
        ));
    }
    

    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'surname' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        $user->update($request->only('surname', 'first_name', 'last_name', 'email'));

        return redirect()->route('profile')->with('success', 'Profile updated');
    }
}

