<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Course;
use Laratrust\Laratrust;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $subscriber = Auth::user()->hasRole('subscriber');
        $admini = Auth::user()->hasRole(['superadministrator', 'administrator'], false);
        $teacher = Auth::user()->hasRole('teacher');

        if ($subscriber) {
          return view('home')->withUser($user);
        }
        if ($admini) {
          return redirect()->route('manage.dashboard');
        }
        if ($teacher) {
          return redirect()->route('courses.dashboard');
        } else {
          return view('home')->withUser($user);
        }
    }
}
