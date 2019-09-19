<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'experience' => request('experience'),
            'bio' => request('bio')
        ]);

        return redirect()->back()->with('message', 'Profile Successfully Updated!');
    }

    public function coverletter(Request $request)
    {
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');

        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover
        ]);

        return redirect()->back()->with('message', 'Cover letter Updated Successfully!');
    }
}
