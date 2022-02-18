<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\SanatoriumResource;
use App\Models\Booking;
use App\Models\BookingUser;
use App\Models\Sale;
use App\Models\Sanatorium;
use App\Models\SanatoriumRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SaleController extends Controller
{

    public function index(Request  $request)
    {

        $sales = Sale::all();
        return view('web.sale.index',compact('sales'));
    }

    public function show(Sale  $sale)
    {

        return view('web.sale.show',compact('sale'));
    }

}
