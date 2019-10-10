@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            @if(empty($company->cover_photo))
                <img src="{{asset('cover/rose16.jpg')}}" class="full-width">
            @else
                <img src="{{asset('uploads/coverphoto')}}/{{ $company->cover_photo }}" class="full-width">
            @endif
            <div class="company-desc">
                @if(empty($company->logo))
                    <img src="{{asset('avatar/man.png')}}" class="thumbnail">
                @else
                    <img src="{{asset('uploads/logo')}}/{{ $company->logo }}" class="thumbnail" style="border-radius: 50%">
                @endif
                <p>{{ $company->description }}</p>
                <h1>{{ $company->cname }}</h1>
                <p><strong>Slogan</strong> -{{ $company->slogan }}&nbsp;
                    Address-{{ $company->address }}&nbsp;
                    Phone-{{ $company->phone }}&nbsp;
                    Website-{{ $company->website}}
                </p>
            </div>
        </div>

        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($company->jobs as $job)
                <tr>
                    <td><img src="{{ asset('avatar/man.png')}}" class="width-80"></td>
                    <td>Position:{{ $job->position }}
                        <br>
                        <i class="fa fa-clock" aria-hidden="true"></i>&nbsp;&nbsp;fulltime
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>Address:{{ $job->address }}</td>
                    <td><i class="fa fa-globe" aria-hidden="true"></i>Date:{{ $job->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                            <button class="btn btn-success btn-sm">Apply</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection