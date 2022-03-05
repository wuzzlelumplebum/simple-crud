@extends('layouts.app')

@section('content')
<div class="page-header border-bottom-0">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h1>Employees List Page</h1>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Data Table</h5>
        @if (Auth::user()->role === 1)
            <a class="btn btn-success" href="{{ route('users.create') }}">Add Data <i class="icon-plus22 ml-1"></i></a>
            <!--<a class="btn btn-success" href="{{ url('/users_pdf') }}">Export PDF <i class="icon-plus22 ml-1"></i></a>-->
        @endif
    </div>

    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><p>{{ $message }}</p></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <table class="table datatable-responsive">
            <div align="right">
                <a href="#" class="list-icons-item" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                </a>
    
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ url('/export-pdf') }}" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                    <a href="{{ url('/export-excel') }}" class="dropdown-item"><i class="icon-file-excel"></i> Export to .xlsx</a>
                </div>
            </div>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    @if (in_array(Auth::user()->role,[1]))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php
                    $key = 1
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td>{{ $key++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>
                        @if (in_array(Auth::user()->role,[1]))
                            <div class="list-icons">
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('users.show',$user->id) }}"><i class="icon-profile"></i></a>
                                    <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}"><i class="icon-pencil7"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="icon-trash"></i></button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection