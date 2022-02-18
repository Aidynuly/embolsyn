<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\SanatoriumResource;
use App\Models\Booking;
use App\Models\BookingUser;
use App\Models\Sanatorium;
use App\Models\SanatoriumRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SanatoriumController extends Controller
{

    public function index(Request  $request)
    {
        if ($request->has('city_id')){
            Session::put('city_id',$request->get('city_id'));
        }

        $sanatoriums = Sanatorium::when($request->has('city_id'),function ($query) {
            $query->where('city_id',request('city_id'));
        })
            ->when($request->get('search'),function ($query,$v) {
            $query->where(function ($q){
                $q->where('title','LIKE',request('search')."%")
                    ->orWhere('description','LIKE',request('search')."%");
            });
        })
            ->with('image')
            ->get();

        $request->flashOnly(['search']);

        return view('web.sanatorium.index',compact('sanatoriums'));
    }

    public function show(Sanatorium $sanatorium)
    {

        $sanatorium->show_count += 1;
        $sanatorium->save();
        return view('web.sanatorium.show',compact('sanatorium'));
    }

    public function history()
    {
        $bookings = Booking::whereUserId(Auth::id())->latest()->get();
        return view('web.sanatorium.history',compact('bookings'));
    }

    public function bookingPage(Request  $request)
    {
            $room = SanatoriumRoom::findOrFail($request->get('room_id'));
            $days = Carbon::parse($request->get('date_from'))->diffInDays($request->get('date_to'));
            $day_from = Carbon::parse($request->get('date_from'))->day;
            $day_to =  Carbon::parse($request->get('date_to'))->day;
            $date_from_month = Carbon::parse($request->get('date_from'))->monthName;
            $date_to_month =  Carbon::parse($request->get('date_to'))->monthName;

            return view('web.sanatorium.booking',[
                'room' => $room,
                'parent_count' => $request->get('parent_count'),
                'children_count' => $request->get('children_count'),
                'day_from' => $day_from,
                'day_to' => $day_to,
                'date_from_month' => $date_from_month,
                'date_to_month' => $date_to_month,
                'days' => $days,
                'date_from' => $request->get('date_from'),
                'date_to' => $request->get('date_to'),
            ]);

    }

    public function booking(Request  $request)
    {

        $room = SanatoriumRoom::findOrFail($request->get('room_id'));
        $days = Carbon::create($request['date_to'])->diffInDays(Carbon::create($request['date_from']));
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->sanatorium_room_id = $room->id;
        $booking->from_date = $request->get('date_from');
        $booking->to_date = $request->get('date_to');
        $booking->total_price =  $days * $room->price;
        $booking->save();
        foreach ($request['users'] as $user) {
            BookingUser::create([
                'booking_id' => $booking->id,
                'name' => $user['name'],
                'surname' => $user['surname'],
                'gender' => $user['gender'],
                'date_birth' => $user['date_birth'],
                'nationality' => $user['nationality'],
                'validity' => $user['validity'],
                'iin' => $user['iin'],
                'type' => $user['type'],
            ]);
        }


        return response()->json([
            'message' => 'дальше уже стр оплаты'
        ]);


    }
}
