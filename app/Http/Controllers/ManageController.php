<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManageController extends Controller
{
    public function index()
    {
      $users = User::orderBy('id', 'desc')->paginate(10);
      return redirect()->route('manage.dashboard')->withUsers($users);
    }

    public function dashboard() {
      $users = User::orderBy('id', 'desc')->paginate(10);
      return view('manage.dashboard')->withUsers($users);
    }
}
