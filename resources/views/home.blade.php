@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <br>
                    <button class="btn btn-primary"><a href="admin/motor/add" style="text-decoration: none; color: white">add new motor</a></button>
                        <br>
                    <button class="btn btn-primary"><a href="admin/list" style="text-decoration: none; color: white">motor list</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
