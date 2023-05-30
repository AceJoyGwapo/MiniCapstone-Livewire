<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function update_profile(Request $request, $id){
        $profile = User::find($id);

        $profile->name = $request->input('name');
        $profile->location = $request->input('location');
        $profile->description = $request->input('description');
        $profile->email = $request->input('email');

        if($request->hasFile('profile_image')){

            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('user_img/', $filename);
            $profile->profile_image = $filename;

    }

    $profile->update();
    return redirect()->back()->with('status', 'Profile updated successfully!');

    }

    public function change_password(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> bcrypt($request->new_password)]);

        return redirect()->back()->with('status', 'Password changed successfully!');
     }
}
