<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManageController extends Controller
{
    public function index()
    {
      return redirect()->route('manage.dashboard');
    }

    public function dashboard() {
      $users = User::with('roles')->orderBy('id', 'desc')->paginate(10);
      // dd($users[0]->roles[0]->display_name);

      return view('manage.dashboard')->withUsers($users);
    }
}
