@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>
                    @isset($message)
                    {{$message}}
                    @endisset
                    </h4>

                    @auth()
                        User name {{auth()->user()->name}}
                        <br/>
                        User Role:{{auth()->user()->role}}
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
