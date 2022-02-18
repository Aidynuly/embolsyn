<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserBookedRoomResource;
use App\Http\Resources\UserResource;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getOffer(Request $request)
    {
        $books = Booking::where('user_id', Auth::id())->distinct()->get();

        return response()->json(UserBookedRoomResource::collection($books));
    }

    public function show(User $user)
    {
        return response()->json( new UserResource($user));
    }

    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' =>  'required',
            'sanatorium_room_id'    =>  'required',
        ]);
        if ($validator->fails()) {
            return self::response(400, null, $validator->errors()->first());
        }
        $user = $request['user'];
        $sanatoriumBooks = Booking::where('sanatorium_room_id', $request['sanatorium_room_id'])->where('user_id', $user['id'])->get();
        if (count($sanatoriumBooks) != 0)
        {
            foreach ($sanatoriumBooks as $sanatoriumBook) {
                $sanatoriumBook->status = 'paid';
                $sanatoriumBook->save();
            }
        }
        return self::response(400, null, 'Not found any sanatoriums');
    }

    public function contact()
    {
        return response()->json(Contact::first());
    }

    public function notification()
    {
        return response()->json(Notification::all());
    }



}
