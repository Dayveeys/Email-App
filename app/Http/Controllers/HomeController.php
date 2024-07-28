<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Contact;
use App\Order;
use App\Home;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin != Null){
            $count_admins = User::where('is_admin', '!=', Null)->where('is_admin', '!=', 1)->count();
            $count_products = Product::all()->count();

            return view('admin.home')->with(compact('count_products', 'count_admins'));
        }

        return redirect('/');
    }
}
