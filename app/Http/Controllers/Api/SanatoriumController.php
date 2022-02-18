<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Resources\SanatoriumResource;
use App\Http\Resources\SanatoriumRoomResource;
use App\Models\BookingUser;
use App\Models\Sanatorium;
use App\Models\SanatoriumRoom;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SanatoriumController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        $sanatoriums = Sanatorium::join('sanatorium_rooms', 'sanatorium_rooms.sanatorium_id', 'sanatoriums.id')
            ->when($request->get('city_id'), function ($q, $v) {
                $q->where('city_id', $v);
            })
            ->when($request->get('count_adults'), function ($q, $v) {
                $q->where('sanatorium_rooms.count_adults', $v);
            })
            ->when($request->get('count_children'), function ($q, $v) {
                $q->where('sanatorium_rooms.count_children', $v);
            })
//            ->when($request->get('count_baby'), function ($q, $v) {
//                $q->where('sanatorium_rooms.count_baby', $v);
//            })
            ->select('sanatoriums.*')
            ->get();

        return response()->json(SanatoriumResource::collection($sanatoriums));
    }

    public function show(Sanatorium $sanatorium): JsonResponse
    {
        return response()->json(new SanatoriumResource($sanatorium));
    }

    public function booking(BookingRequest $request): JsonResponse
    {
        $sanatorium = SanatoriumRoom::findOrFail($request['sanatorium_room_id']);


        $days = Carbon::create($request['to_date'])->diffInDays(Carbon::create($request['from_date']));
        $price = $days * $sanatorium->price;

        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->sanatorium_room_id = $request->get('sanatorium_room_id');
        $booking->from_date = $request->get('from_date');
        $booking->to_date = $request->get('to_date');
        $booking->total_price =  $days * $sanatorium->price;
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
            'price' => $price
        ]);
    }

    //Хз
    public function getAvailableSanatorium(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required|exists:cities,id',
            'count_adults' => 'required',
            'count_children' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        if ($validator->fails()) {
            return self::response(400, null, $validator->errors()->first());
        }
        $sanatoriumRooms = SanatoriumRoom::where('count_adults', '=<', $request['count_adults'])
            ->where('count_children', '=<', $request['count_children'])
            ->whereNull('from_date')
            ->whereNull('to_date')
            ->get();
        if (count($sanatoriumRooms) != 0) {
            return self::response(200, SanatoriumRoomResource::collection($sanatoriumRooms), '');
        }
        return self::response(400, null, 'Not found!');
    }


}
