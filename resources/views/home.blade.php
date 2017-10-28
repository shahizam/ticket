@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <li><a href="{{ route('create_ticket') }}">Report A Problem</a></li>
                    <li><a href="{{ route('user_tickets') }}">Show Reported Problems</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
