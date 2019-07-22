<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function edit()
    {
        return view('admin.profiles.edit')->with('user', Auth::user());
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'image',
            'github' => 'url'
        ]);
            
        $user = Auth::user();

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);
            $user->profile->avatar = 'uploads/avatars/' . $avatar_new_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->github = $request->github;

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        $user->profile->save();

        $user->password = bcrypt($request->password);

        

        Session::flash('success', 'You have updated your profile.');

        return redirect()->back();
    }
}
