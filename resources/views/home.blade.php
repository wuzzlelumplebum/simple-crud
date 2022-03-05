@extends('layouts.app')

@section('content')
<div class="page-header border-bottom-0">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Welcome back, {{ Auth::user()->name }}</h5>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            Logged in as {{ config('custom.role.'.Auth::user()->role) }}
        </div>
    </div>
</div>
@endsection
