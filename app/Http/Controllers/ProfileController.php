<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use File;
use Session;

class ProfileController extends Controller
{


  public function profile()
  {
    $user = Auth::user();
    return view('profile')->withUser($user);
  }

  public function update_avatar(Request $request)
  {
    // Handle the user upload of avatar
    $this->validate($request, [
      'avatar' => 'required|image|mimes:jpg,jpeg,png,bmp|max:1999'
    ]);

    if ($request->hasFile('avatar')) {
      $avatar = $request->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      // delete users old image add this before uplading the new image. Remember to add "use File; on the top of the controller"
       if (Auth::user()->avatar != "default.jpg") {
           $path = '/uploads/avatars/';
           $lastpath= Auth::user()->avatar;
           File::Delete(public_path( $path . $lastpath) );

       }

      Image::make($avatar)->fit(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

      $user = Auth::user();
      $user->avatar = $filename;
      $user->save();
    }

    Session::flash('success', __('messages.profile', ['name' => $user->name]));
    return view('profile')->withUser(Auth::user());
  }

  public function update_email(Request $request)
  {
    // Handle the user update of email adress
    $this->validate($request, [
      'email' => 'required|email|unique:users'
    ]);

    if ($request->email) {
      $email = trim($request->email);
      $user = Auth::user();
      $user->email = $email;
      $user->save();
    }

    Session::flash('success', __('messages.profile', ['name' => $user->name]));
    return view('profile')->withUser(Auth::user());
  }
}
