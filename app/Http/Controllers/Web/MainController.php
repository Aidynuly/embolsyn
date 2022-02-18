<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Sanatorium;
use App\Models\Setting;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $populars = Sanatorium::limit(3)->orderBy('show_count')->get();
        $profitable_offers = Sanatorium::limit(3)->orderBy('price')->latest()->get();
        return view('web.main',compact('populars','profitable_offers'));
    }
    public function notification()
    {
        $notifications = Notification::where('user_id',\Auth::id())
            ->with('sanatorium')
            ->get();
        return view('web.notification',compact('notifications'));
    }
    public function dock()
    {
        return view('web.dock');
    }
    public function contact()
    {
        $contact = Contact::firstOrFail();
        return view('web.contact',compact('contact'));
    }
    public function cooperate()
    {
        $setting = Setting::firstOrFail();
        return view('web.cooperate',compact('setting'));
    }
}
