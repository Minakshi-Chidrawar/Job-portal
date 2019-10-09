@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Update a Job</div>
                <div class="card-body">
                    <form action="{{ route('job.update', [$job->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $job->title }}" required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" required autocomplete="description">{{ $job->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="roles">Role:</label>
                            <textarea name="roles" class="form-control @error('roles') is-invalid @enderror" required autocomplete="roles">{{ $job->roles }}</textarea>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('roles') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category_id" class="form-control" id="">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{ $cat->id }}"{{ $cat->id==$job->category_id?'selected':'' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ $job->position }}" required autocomplete="position">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('position') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $job->address }}" required autocomplete="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select name="type" class="form-control" id="">
                                <option value="fulltime"{{ $job->type=='fulltime'?'selected':'' }}>fulltime</option>
                                <option value="parttime"{{ $job->type=='parttime'?'selected':'' }}>parttime</option>
                                <option value="casual"{{ $job->type=='casual'?'selected':'' }}>casual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" id="">
                                <option value="1"{{ $job->status==1?'selected':'' }}>live</option>
                                <option value="0"{{ $job->status==0?'selected':'' }}>draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lastdate">Last date:</label>
                            <input type="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{ $job->last_date) }}" required autocomplete="last_date">
                            @error('last_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_date') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection