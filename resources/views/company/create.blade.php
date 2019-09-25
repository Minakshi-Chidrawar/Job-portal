@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->avatar))
                <img src="{{ asset('avatar/man.png') }}" width="100" class="full-width">
            @else
                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" width="100" class="full-width">
            @endif
            <br>
            <br>
            <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Update logo</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="avatar">
                        <br>
                        <button class="btn btn-success float-right">Update</button>

                        @if($errors->has('avatar'))
                            <div class="alert alert-danger">
                                {{ $errors->first('avatar') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Update Your Company Information</div>
                <form action="{{ route('company.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->company->address }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->company->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ Auth::user()->company->website }}">
                        </div>
                        <div class="form-group">
                            <label for="">Slogan</label>
                            <input type="text" class="form-control" name="slogan" value="{{ Auth::user()->company->slogan }}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="5">{{ Auth::user()->company->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>                
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About your company</div>
                <div class="card-body">
                    <p>Company Name: {{ Auth::user()->company->cname }}</p>
                    <p>Company Address: {{ Auth::user()->company->address }}</p>
                    <p>Company Phone: {{ Auth::user()->company->phone }}</p>
                    <p>Company Website: <a href="{{ Auth::user()->company->website }}">{{ Auth::user()->company->website }}</a></p>
                    <p>Company Slogan: {{ Auth::user()->company->slogan }}</p>
                    <p>Company Page: <a href="company/{{ Auth::user()->company->slug }}">View</a></p>
                </div>
            </div>

            <br>
            <form action="{{ route('cover.photo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Update coverletter</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_photo">
                        <br>
                        <button class="btn btn-success float-right">Update</button>

                        @if($errors->has('cover_letter'))
                            <div class="alert alert-danger">
                                {{ $errors->first('cover_letter') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection