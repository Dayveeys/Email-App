<?php

namespace App\Http\Controllers;

use App\Mail\LaraEmail;
use App\User;
use App\Product;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class CustomersController extends Controller
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
        if(Auth::user()->is_admin != 1){

            $products = Product::with('user')->get()->where('user_id' , '=', Auth::user()->id)->sortByDesc('id');

            return view('admin.customers', compact('products'));
        }elseif(Auth::user()->is_admin == 1){

            $products = Product::with('user')->get()->sortByDesc('id');

            return view('admin.customers', compact('products'));
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string'],
        ]);


        $data = request()->all();

        $date=date("Y-m-d");
        $time=date("h:i:s");
        $now = $date.' '.$time;

        $mailInfo = new \stdClass();
        $mailInfo->sender = "bookyourvacay.com";
        $mailInfo->senderCompany = "Bookyourvacay";
        $mailInfo->subject = $data['subject'];

        Mail::to($data['email'])
            ->send(new LaraEmail($mailInfo));


        Product::create([
            'user_id' => Auth::user()->id,
            'email' => $data['email'],
        ]);

        return back()->with('success', 'Email successfully sent!');
    }
}
