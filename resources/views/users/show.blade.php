@extends('layouts.app')

@section('content')
<div class="page-header border-bottom-0">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h1>Profile Page</h1>
        </div>
    </div>
</div>
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">My Profile</h5>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <fieldset class="mb-3">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><b>Nama</b></label>
                    <div class="col-lg-10">
                        <div class="form-control-plaintext">{{ $user->name }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><b>Email</b></label>
                    <div class="col-lg-10">
                        <div class="form-control-plaintext">{{ $user->email }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><b>Phone Number</b></label>
                    <div class="col-lg-10">
                        <div class="form-control-plaintext">{{ $user->no_hp }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><b>Address</b></label>
                    <div class="col-lg-10">
                        <div class="form-control-plaintext">{{ $user->alamat }}</div>
                    </div>
                </div>
            </fieldset>
            <div class="text-right">
                <a class="btn btn-danger" href="{{ route('users.index') }}">Back <i class="icon-home4 ml-2"></i></a>
                <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">Edit <i class="icon-pencil7 ml-2"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection