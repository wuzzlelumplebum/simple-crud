@extends('layouts.app')

@section('content')
<div class="content d-flex justify-content-center align-items-center">
    <form class="login-form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Create account</h5>
                    <span class="d-block text-muted">All fields are required</span>
                </div>
    
                <div class="form-group text-center text-muted content-divider">
                    <span class="px-2">Your credentials</span>
                </div>
    
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
    
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>
    
                <div class="form-group text-center text-muted content-divider">
                    <span class="px-2">Your data</span>
                </div>
    
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="form-control-feedback">
                        <i class="icon-vcard text-muted"></i>
                    </div>
                </div>
    
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                </div>
    
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" placeholder="Phone Number">
                        @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="form-control-feedback">
                        <i class="icon-phone2 text-muted"></i>
                    </div>
                </div>
    
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" placeholder="Address">
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="form-control-feedback">
                        <i class="icon-location4 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn bg-teal-400 btn-block">Register</button>
                </div>
                <div class="text-center">
                    Already have an account?<a href="{{ route('login') }}"> Sign in</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
