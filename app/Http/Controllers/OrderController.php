<?php

namespace App\Http\Controllers;

use App\Mail\LaraEmail;
use App\Notifications\OrderCancelled;
use App\Product;
use Illuminate\Notifications\Notifiable;
use App\Order;
use App\Booking;
use App\User;
use App\State;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Hash;
use Rave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('remove_link_extra_slash');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin != NULL){
            $orders = Booking::with('user', 'product')->get()->sortByDesc('id');
            $users = User::where('is_admin', '=', Null)->orderBy('id', 'desc')->get();
            $count = Booking::all()->count();
            Auth::user()->unreadNotifications->where('type', 'App\Notifications\NewOrder')->markAsRead();

            return view('admin.orders', compact('orders', 'users', 'count'));
        }
        else{
            $orders = Booking::with(['product'])->where('user_id', Auth::User()->id)->get()->sortByDesc('id');
            return view('orders', compact('orders'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, $id)
    {
        Booking::where('id', $id)->update([
            'order_status' => 'Successful',
            'payment_status' => 'Paid'
        ]);

        $products = Booking::with("product")->where('id', '=', $id)->first();

        $users = Booking::with("user")->where('id', '=', $id)->first();

        $booking = Booking::where('id', '=', $id)->first();

        $mailInfo = new \stdClass();
        $mailInfo->year = date("Y");
        $mailInfo->image = $products->product->photo;
        $mailInfo->city = $products->product->city;
        $mailInfo->checkin = $booking->checkin;
        $mailInfo->checkout = $booking->checkout;
        $mailInfo->rooms = $booking->num_of_rooms;
        $mailInfo->title = $booking->room;
        $mailInfo->ref = $booking->ref_num;
        $mailInfo->recieverName = $users->user->first_name;
        $mailInfo->amount = $booking->amount;
        $mailInfo->for_what = 'stays';
        $mailInfo->sender = "bookyourvacay.com";
        $mailInfo->senderCompany = "Bookyourvacay";
        $mailInfo->subject = "BOOKING SUCCESSFUL";

        Mail::to($users->user->email)
            ->send(new LaraEmail($mailInfo));

        return back()->with('updated', 'Booking Status has been updated!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, $id)
    {
        Booking::where('id', $id)->update([
            'order_status' => 'Cancelled',
            'payment_status' => 'Unpaid'
        ]);

        $ref = Booking::where('id', '=', $id)->first()->ref_num;

        $user_id = Booking::where('id', '=', $id)->first()->user_id;

        $toUser = User::find($user_id);

        $data =  [
            'user' => $toUser,
            'ref' => $ref
        ];

        $toUser->notify(new OrderCancelled($data));

        return back()->with('updated', 'Order has been marked as cancelled!');

    }
}
