<?php

namespace App\Http\Controllers;

use App\Job;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company)
    {
        return view ('company.index', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description')
        ]);

        return redirect()->back()->with('message', 'Company details are Successfully Updated!');
    }

    public function coverPhoto(Request $request)
    {
        $user_id = auth()->user()->id;

        if ($request->hasfile('cover_photo'))
        {
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = rand(1, 9999) . time() . '.' . $ext;
            $file->move('uploads/coverphoto/', $filename);

            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename
            ]);
    
            return redirect()->back()->with('message', 'Company cover photo Updated Successfully!');
        }
    }
}
