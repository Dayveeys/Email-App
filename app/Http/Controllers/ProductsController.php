<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin != Null){

            $customers = User::where('is_admin', '=', Null)->where('email', '!=', 'deleted')->get()->sortByDesc('id');

            return view('admin.customers', compact('customers'));
        }

        return redirect('/');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
            'last_name' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Z ]+$/'],
            'phone' => ['required', 'min:11', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $data = request()->all();

        $date=date("Y-m-d");
        $time=date("h:i:s");
        $now = $date.' '.$time;

        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'email_verified_at' => $now,
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('success', 'Image successfully uploaded!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->update([
            'email' => "deleted",
            'password' => "deleted",
        ]);

        return back()->with('deleted', 'Record deleted successfully');
    }
}
