<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
      return view('sessions.login');
    }


public function store()
{
  $attributes = request()->validate([
    'email' => 'required|email',
    'password' => 'required'
  ]);

  if (auth()->attempt($attributes)) {
    return redirect('/')->with('success', 'Welcome Back!');
  }

  return back()
  ->withInput()
  ->withErrors(['email' => 'Your provided credentials could not be verified.']);
}

public function destroy()
    {
      auth()->logout();

      return redirect('/')->with('success', 'Goodbye!');
    }
}
?>
