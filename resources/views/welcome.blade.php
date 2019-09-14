@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @for($i=0; $i<=10; $i++)
                <tr>
                    <td><img src="{{ asset('avatar/rose.jpg')}}" alt=""></td>
                    <td>Position: Web developer
                        <br>
                        <i class="fa fa-clock" aria-hidden="true"></i>&nbsp;&nbsp;fulltime
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>Address: Melbourne</td>
                    <td><i class="fa fa-globe" aria-hidden="true"></i>Date: 2019-08-14</td>
                    <td><button class="btn btn-success btn-sm">Apply</button></td>
                </tr>
                @endfor
            </tbody>
        </table>

    </div>
</div>
@endsection
