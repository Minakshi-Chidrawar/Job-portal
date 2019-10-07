@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                @foreach($applicants as $applicant)
                    <div class="card-header">
                        <a href="{{ route('jobs.show', [$applicant->id, $applicant->slug]) }}">
                            {{ $applicant->title}}
                        </a>
                    </div>
                    <div class="card-body">
                    @foreach($applicant->users as $user)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->bio }}</td>
                                    <td>{{ $user->experience }}</td>
                                    <td><a href="{{ Storage::url($user->resume) }}">Resume</a></td>
                                    <td><a href="{{ Storage::url($user->cover_letter) }}">Cover</a></td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
