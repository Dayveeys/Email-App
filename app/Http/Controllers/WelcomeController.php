<?php

namespace App\Http\Controllers;

use App\Outbound;
use App\Product;
use App\Rental;
use App\Country;
use App\State;
use App\City;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        return redirect('admin/home');
    }

}
