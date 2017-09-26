@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Wellcome {{ $user->name }},</div>

                <div class="panel-body">
                    You are logged in as {{ $user->roles()->get()->first()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
