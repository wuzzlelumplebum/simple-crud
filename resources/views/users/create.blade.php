@extends('layouts.app')

@section('content')
    <div class="page-header border-bottom-0">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h1>Add Data Page</h1>
            </div>
        </div>
    </div>
    <div class="content">
        <!-- Form inputs -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Input Data</h5>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('users.store') }}" method="post" id="myForm">
                @csrf
                @method('POST')
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Data Diri</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" placeholder="Enter your name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">No HP</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" name="no_hp" placeholder="Enter your phone number">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                            <textarea rows="3" cols="3" class="form-control" name="alamat" placeholder="Enter your address"></textarea>
                        </div>
                    </div>
                    
                    <legend class="text-uppercase font-size-sm font-weight-bold">Data Akun</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Username</label>
                        <div class="col-lg-10">
                            <input type="text" name="username" class="form-control" placeholder="Enter your username">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Role</label>
                        <div class="col-lg-10">
                            <select name="role" class="form-control form-control-uniform" required>
                                @foreach (config('custom.role') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>

                </fieldset>

                <div class="text-right">
                    <a class="btn btn-danger" href="{{ route('users.index') }}">Cancel <i class="icon-home4 ml-2"></i></a>
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                </div>
                </form>
            </div>
        </div>
        <!-- /form inputs -->
    </div>

@endsection