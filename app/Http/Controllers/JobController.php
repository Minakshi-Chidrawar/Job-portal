<?php

namespace App\Http\Controllers;

use Auth;
use App\Job;
use App\User;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer', ['except' => array('index', 'show', 'apply')]);
    }
    
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function show($id, Job $job)
    {
        //dd($job);
        return view('jobs.show', compact('job'));
    }

    public function company()
    {
        return view('company.index');
    }

    public function myJob()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myJob', compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);

        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->All());

        return redirect()->back()->with('message', 'Job updated successfully!');
    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        //dd($applicants);
        return view('jobs.applicants', compact('applicants'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;

        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' =>str_slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date')
        ]);

        return redirect()->back()->with('message', 'Job posted successfully!');
    }

    public function apply(Request $request, $id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);

        return redirect()->back()->with('message', 'Application sent!');
    }
}
