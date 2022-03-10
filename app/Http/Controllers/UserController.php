<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role === 99){
            $results['users'] = User::all()->sortBy('name')->where('role', '=', '99');
    
            return view('users.index', $results);
        }
        else{
            $results['users'] = User::all()->sortBy('name');
            return view('users.index', $results);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'username'=>['required', Role::unique('users')->whereNull('deleted_at')],
            'role'=>'required'
        ]);

        $data = $request->except(['_token', '_method']);

        if($request->get('password')!=''){
            $data['password'] = bcrypt($request->get('password'));
        }

        // dd($data);
        // User::create($request->all());
        User::create($data);

        return redirect('/users')->with('success','Employee data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        return view('users.edit', ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $data = $request->except(['_token', '_method','password']);

        if($request->get('password')!=''){
            $data['password'] = bcrypt($request->get('password'));
        }

        // dd($data);

        $user->update($data);

        return redirect('/users')->with('success','Employee data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('success','Employee data deleted');
    }

    public function exportPDF()
    {
        if(Auth::user()->role === 1){
            $data = User::all()->sortBy('name');
            //dd($data);
    
            $pdf = PDF::loadView('export_pdf', ['users' => $data]);
    
            return $pdf->stream('employees-data.pdf');
        }
        else{
            $data = User::all()->sortBy('name')->where('role', '=', '99');
            //dd($data);

            $pdf = PDF::loadView('export_pdf', ['users' => $data]);

            return $pdf->stream('employees-data.pdf');
        }
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'employees.xlsx');
    }
}
