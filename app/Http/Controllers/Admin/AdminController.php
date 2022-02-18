<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sanatorium;
use App\Models\SanatoriumRoom;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function main()
    {
        $data['sanatoriums'] = Sanatorium::get()->count();
        $data['sanatorium_rooms'] = SanatoriumRoom::get()->count();

        return view('home', ['data' => $data]);
    }
}
